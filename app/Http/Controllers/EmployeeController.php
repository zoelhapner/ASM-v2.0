<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Religion;
use App\Models\License;
use App\Models\Employee;
use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\PostalCode;
use Illuminate\Support\Carbon;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $employees = $this->getJoinedEmployees();

            return DataTables::of($employees)
                ->addColumn('birth_date', fn($row) => $row->birth_date ? Carbon::parse($row->birth_date)->format('d/m/Y') : '-')
                ->addColumn('start_date', fn($row) => $row->start_date ? Carbon::parse($row->start_date)->format('d/m/Y') : '-')
                ->addColumn('marital_status', fn($row) => $this->readableMaritalStatus($row->marital_status))
                ->addColumn('gender', fn($row) => $this->readableGender($row->gender))
                ->editColumn('birth_place', fn($row) => Str::title($row->birth_place))
                ->editColumn('address', fn($row) => Str::title($row->address))
                ->editColumn('nickname', fn($row) => Str::title($row->nickname))
                ->editColumn('fullname', function ($row) {
                    $url = route('employees.show', $row->employee_id);
                    $name = Str::title($row->fullname);
                    return '<a href="'.$url.'">'.e($name).'</a>'; // Ganti dengan route detailmu
                })
                ->addColumn('action', function ($employees) {
                    $buttons = '';
                    $buttons .= '<a href="' . route('employees.edit', $employees->employee_id) . '" class="btn btn-success btn-sm">Edit</a> ';
                    $buttons .= '<a href="' . route('employees.show', $employees->employee_id) . '" class="btn btn-secondary btn-sm">Show</a> ';
                    $buttons .= '<button data-id="' . $employees->employee_id . '" class="btn btn-danger btn-sm delete-employee">Delete</button>';
                    return $buttons;
                })

                ->rawColumns(['fullname', 'action'])
                ->make(true);
        }


        return view('employees.index');
    }

    private function getJoinedEmployees()
{
    $auth = auth()->user();


    $query = \DB::table('employees')
    ->join('users', 'employees.user_id', '=', 'users.id')
    ->join('employee_license', 'employees.id', '=', 'employee_license.employee_id')
    ->join('licenses', 'employee_license.license_id', '=', 'licenses.id')
    ->leftJoin('religions', 'employees.religion_id', '=', 'religions.id')
    ->leftJoin('provinces', 'employees.province_id', '=', 'provinces.id')
    ->leftJoin('cities', 'employees.city_id', '=', 'cities.id')
    ->leftJoin('districts', 'employees.district_id', '=', 'districts.id')
    ->leftJoin('sub_districts', 'employees.sub_district_id', '=', 'sub_districts.id')
    ->leftJoin('postal_codes', 'employees.postal_code_id', '=', 'postal_codes.id')
    ->select(
        'employees.id as employee_id',
        'employees.nik',
        'licenses.license_type as license_type',
        'licenses.name as license_name',
        'employees.fullname',
        'employees.nickname',
        'employees.gender',
        'employees.birth_place',
        'employees.birth_date',
        'employees.marital_status',
        'religions.name as religion_name',
        'employees.identity_number',
        'users.email as users_email',
        'employees.address',
        'provinces.name as province_name',
        'cities.name as city_name',
        'districts.name as district_name',
        'sub_districts.name as sub_district_name',
        'postal_codes.postal_code',
        'employees.phone',
        'employees.position',
        'employees.department',
        'employees.unit',
        'employees.employment_status',
        'employees.start_date',
        'employees.basic_salary',
        'employees.allowance',
        'employees.deduction',
        'employees.bonus',
        'employees.thr',
        'employees.contract_letter_file',
        'employees.photo'
    );

    if ($auth->hasRole('Karyawan')) {
        $query->where('employees.user_id', $auth->id);
    }

    return $query;
}


    private function readableMaritalStatus($value)
    {
        return match ((int) $value) {
            1 => 'Belum Menikah',
            2 => 'Sudah Menikah',
            3 => 'Cerai Hidup',
            4 => 'Cerai Mati',
            default => '-',
        };
    }

    private function readableGender($value)
    {
        return match ((int) $value) {
            1 => 'Laki - Laki',
            2 => 'Perempuan',
            default => '-',
        };
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $religions = Religion::all();
        $licenses = License::all(); 
        $provinces = Province::all();
        $employees = \App\Models\User::role('Karyawan')->get();
        return view('employees.create', compact('religions', 'licenses', 'provinces', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([ 
            'licenses' => 'required|array',
            'licenses.*' => 'exists:licenses,id',
            'nik' => 'required|unique:employees,nik',
            'fullname' => 'required',
            'nickname' => 'required',
            'gender' => 'required|in:1,2',
            'birth_place' => 'required',
            'birth_date' => ['required', 'date_format:Y-m-d'],
            'email' => 'required|email|unique:users,email',
            'marital_status' => 'required|in:1,2,3',
            'religion_id' => 'required|exists:religions,id',
            'identity_number' => 'required|digits:16',
            'address' => 'required',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
            'sub_district_id' => 'required|exists:sub_districts,id',
            'postal_code_id' => 'required|exists:postal_codes,id',
            'phone' => 'required',
            'position' => 'required',
            'department' => 'required',
            'unit' => 'required',
            'employment_status' => 'required',
            'start_date' => ['required', 'date_format:Y-m-d'],
            'basic_salary' => ['required', 'numeric', 'min:0'],
            'allowance' => ['required', 'numeric', 'min:0'],
            'deduction' => ['required', 'numeric', 'min:0'],
            'bonus' => ['required', 'numeric', 'min:0'],
            'thr' => ['required', 'numeric', 'min:0'], 
            'contract_letter_file' => ['required', 'file', 'mimes:pdf', 'max:2048'],
            'photo' => ['nullable|image|mimes:jpeg,png,jpg,gif|max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('photos', $filename, 'public');
            $validated['photo'] = $filename;
        }

        if ($request->hasFile('contract_letter_file')) {
            $file = $request->file('contract_letter_file');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('contracts', $filename, 'public');
            $validated['contract_letter_file'] = $filename;
        }

        $user = \App\Models\User::create([
        'name' => $validated['fullname'],
        'email' => $validated['email'],
        'password' => bcrypt('password123'), // atau gunakan password generator
        ]);

        $user->assignRole('Karyawan');

        $validated['user_id'] = $user->id;

          $employee = Employee::create(
            collect($validated)->except(['licenses', 'email'])->toArray()
          );

          $employee->licenses()->sync($validated['licenses']);
             

        return redirect()->route('employees.index')->with('success', 'Data berhasil ditambahkan.');
        
    }

    /**
     * Display the specified resource.
     */

        public function show(Employee $employee)
    {

        $employee->load(['religion', 'user.licenses', 'province', 'city', 'district', 'subDistrict', 'postalCode']);
        return view('employees.show', compact('employee'));
    }

        

    public function showProfile($id)
    {
    $employee = Employee::with(['user.licenses', 'religion'])->findOrFail($id);
    return view('employees.tab.profile', compact('employee'));
    }

    public function showTab($id)
{
    $employee = Employee::with('educations')->findOrFail($id);
    return view('employees.tab.educations', compact('employee'));
}

    public function showWorks($id)
{
    $employee = Employee::with('workers')->findOrFail($id);
    return view('employees.tab.workers', compact('employee'));
}

    public function showFams($id)
{
    $employee = Employee::with('families')->findOrFail($id);
    return view('employees.tab.families', compact('employee'));
}
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $religions = Religion::all();
        $provinces = Province::all();
        $allLicenses = License::all(); 

         // Ambil salah satu license kalau mau load data wilayah
        $license = $employee;

        $cities = collect();
        $districts = collect();
        $subDistricts = collect();
        $postalCodes = collect();

        if ($license) {
        $cities = City::where('province_id', $license->province_id)->get();
        $districts = District::where('city_id', $license->city_id)->get();
        $subDistricts = SubDistrict::where('district_id', $license->district_id)->get();
        $postalCodes = PostalCode::where('sub_district_id', $license->sub_district_id)->get();
        }

        return view('employees.edit', compact('employee','religions', 'license', 'provinces', 'allLicenses', 'cities', 'districts', 'subDistricts', 'postalCodes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
        'licenses' => 'required|array',
        'licenses.*' => 'exists:licenses,id',
        'fullname' => 'required',
        'nik' => [
            'required',
            Rule::unique('employees', 'nik')->ignore($employee->id),
            ],
        'nik' => 'required',
        'nickname' => 'required',
        'gender' => 'required|in:1,2',
        'birth_place' => 'required',
        'birth_date' => ['required', 'date_format:Y-m-d'],
        'email' => 'required|email|unique:users,email,' . $employee->user_id,
        'marital_status' => 'required|in:1,2,3',
        'religion_id' => 'required|exists:religions,id',
        'identity_number' => 'required|digits:16',
        'address' => 'required',
        'province_id' => 'required|exists:provinces,id',
        'city_id' => 'required|exists:cities,id',
        'district_id' => 'required|exists:districts,id',
        'sub_district_id' => 'required|exists:sub_districts,id',
        'postal_code_id' => 'required|exists:postal_codes,id',
        'phone' => 'required',
        'position' => 'required',
        'department' => 'required',
        'unit' => 'required',
        'employment_status' => 'required',
        'start_date' => ['required', 'date_format:Y-m-d'],
        'basic_salary' => ['required', 'numeric', 'min:0'],
        'allowance' => ['required', 'numeric', 'min:0'],
        'deduction' => ['required', 'numeric', 'min:0'],
        'bonus' => ['required', 'numeric', 'min:0'],
        'thr' => ['required', 'numeric', 'min:0'],
        'contract_letter_file' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
        'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
    ]);

    // 📌 Replace foto baru
    if ($request->hasFile('photo')) {
        if ($employee->photo && Storage::disk('public')->exists('photos/' . $employee->photo)) {
            Storage::disk('public')->delete('photos/' . $employee->photo);
        }

        $file = $request->file('photo');
        $filename = time() . '_photo.' . $file->getClientOriginalExtension();
        $file->storeAs('photos', $filename, 'public');
        $validated['photo'] = $filename;
    }

    // 📌 Replace Surat Perjanjian Kerja
    if ($request->hasFile('contract_letter_file')) {
        if ($employee->contract_letter_file && Storage::disk('public')->exists('contracts/' . $employee->contract_letter_file)) {
            Storage::disk('public')->delete('contracts/' . $employee->contract_letter_file);
        }

        $file = $request->file('contract_letter_file');
        $filename = time() . '_contract.' . $file->getClientOriginalExtension();
        $file->storeAs('contracts', $filename, 'public');
        $validated['contract_letter_file'] = $filename;
    }

    // 📌 Update Employee
    $employee->update(collect($validated)->except(['licenses', 'email'])->toArray());

    // 📌 Update User
    if ($employee->user) {
        $employee->user->update([
            'name' => $validated['fullname'],
            'email' => $validated['email'],
        ]);
        
        $employee->licenses()->sync($validated['licenses']);
    }

    return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
            if ($employee) {
            $employee->delete();
            return response()->json(['status' => 'success', 'message' => 'License deleted successfully']);
        }

        return response()->json(['status' => 'failed', 'message' => 'Unable to delete']);
    }
}
