<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
 
class UsersController extends Controller
{
    
    public function index(Request $request) {
    
        if ($request->ajax()) {

            $users = User::query();

            return Datatables::eloquent($users)

            ->addIndexColumn()
            
            ->addColumn('created_at', function($user) {
                return Carbon::parse($user->created_at)->format('Y-m-d');
            })

            ->addColumn('action', function($user) {
                $editUrl = route('users.edit', $user->id);

                return ' 
                    <a href="'.$editUrl.'" class="btn btn-primary btn-sm">Edit</a>
                    <button data-id="'.$user->id.'" class="btn btn-danger btn-sm delete-user">Delete</button>
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
    
        $request->validate(['name' => 'required', 'email' => 'required|email|unique:users,email', 'password' => 'required']);
        User::create([
            'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request['password']),
        ]);

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
        'password' => 'required',
    ]);

        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'Data berhasil diperbarui.');

    } 

    public function destroy(User $user) {
    
        if ($user) {
            $user->delete();
            return response()->json(['status' => 'success', 'message' => 'User deleted successfully']);
        }

        return response()->json(['status' => 'failed', 'message' => 'Unable to delete']);
    }

}