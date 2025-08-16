<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
 
class UsersController extends Controller
{
    
    public function index(Request $request) 
    {
    
        if ($request->ajax()) {

            $auth = auth()->user();

            if ($auth->hasRole('Super-Admin')) {
                 $users = User::query();
            }  else if ($auth->hasAnyRole(['Pemilik Lisensi', 'Karyawan'])) {
                $users = User::where('license_id', $auth->license_id)
                 ->whereHas('roles', function ($q) {
                     $q->whereIn('name', ['Pemilik Lisensi', 'Karyawan']);
                 });
}
 else {
            // Default: hanya user itu sendiri
            $users = User::where('user_id', $auth->id);
        }

            return Datatables::of($users)

            ->addIndexColumn()

            ->addColumn('created_at', function($user) {
                return Carbon::parse($user->created_at)->format('d-m-Y');
            })

            ->addColumn('action', function($user) {
                $editUrl = route('users.edit', $user->id);

                return ' 
                    <a href="'.$editUrl.'" class="btn btn-success btn-sm" title= "Ubah"
                        <i class="ti ti-edit"></i>
                    </a>
                    <button data-id="'.$user->id.'" class="btn btn-danger btn-sm delete-user" title="Hapus"
                        <i class="ti ti-trash"></i>
                    </button>
                '; 
            })

            ->rawColumns(['action'])
            ->make(true);
        }
          
        return view('users.index');
    }

    public function create() {
    
        return view('users.create');
    }

    public function store(Request $request) {
    
        $request->validate(['name' => 'required', 'email' => 'required|email|unique:users,email', 'password' => 'required', 'role' => 'required|string|exists:roles,name',]);

        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request['password']),
        ]);
           // Assign role langsung
        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(User $user) {

       return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        
       $validated = $request->validate([
        'name' => 'required',
        'email' => [
            'required',
            'email',
             Rule::unique('users')->ignore($user->id),
        ],
        'password' => 'nullable',
        'role' => 'required|string|exists:roles,name',
    ]);

        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'Data berhasil diperbarui.');

    } 

    public function destroy(User $user) 
    {
    
        if ($user) {
            $user->delete();
            return response()->json(['status' => 'success', 'message' => 'User deleted successfully']);
        }

        return response()->json(['status' => 'failed', 'message' => 'Unable to delete']);
    }

}