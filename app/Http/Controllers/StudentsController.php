<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\License;
use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\PostalCode;
use App\Models\Religion;
use App\Models\Role;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    
    private function readableGender($value)
    {
        return match ((int) $value) {
            1 => 'Laki - Laki',
            2 => 'Perempuan',
            default => '-',
        };
    }

    private function readableInfo($value)
    {
        return match ((int) $value) {
            1 => 'Teman/Keluarga',
            2 => 'Website AHA',
            3 => 'Instagram',
            4 => 'Tiktok',
            5 => 'Facebook',
            6 => 'Youtube',
            7 => 'Whatsapp',
            8 => 'Banner',
            9 => 'Kantor AHA',
            default => '-',
        };
    }
    
    public function index(Request $request)
    { 
        $user = Auth::user();
        $students = Student::query()
            ->with(['province', 'city', 'district', 'subDistrict', 'postalCode']);

        // Cek role user
        if ($user->hasRole('Siswa')) {

            $students->where('students.user_id', $user->id);

        } elseif ($user->hasAnyRole(['Pemilik Lisensi', 'Akuntan'])) {
            // Ambil semua license ID sesuai role
            if ($user->hasRole('Pemilik Lisensi')) {
                $licenseIds = $user->licenses()->pluck('id')->toArray();
            } elseif ($user->hasRole('Akuntan')) {
                $licenseIds = $user->employee?->licenses()->pluck('id')->toArray() ?? [];
            } else {
                $licenseIds = [];
            }

            // Jika ada license aktif di session & dimiliki user → pakai itu
            $activeLicenseId = session('active_license_id');
            if ($activeLicenseId && in_array($activeLicenseId, $licenseIds)) {
                $students->where('students.license_id', $activeLicenseId);
            } else {
                // Kalau tidak ada session atau session tidak valid, pakai semua lisensi user
                $students->whereIn('students.license_id', $licenseIds);
            }
        }

        if ($request->ajax()) {
        $students = $students
        ->leftJoin('licenses', 'students.license_id', '=', 'licenses.id')
        ->leftJoin('provinces', 'students.province_id', '=', 'provinces.id')
        ->leftJoin('cities', 'students.city_id', '=', 'cities.id')
        ->leftJoin('districts', 'students.district_id', '=', 'districts.id')
        ->leftJoin('sub_districts', 'students.sub_district_id', '=', 'sub_districts.id')
        ->leftJoin('postal_codes', 'students.postal_code_id', '=', 'postal_codes.id')
        ->leftJoin('religions', 'students.religion_id', '=', 'religions.id')
        ->select(
            'students.*',
            'licenses.license_type as license_type',
            'licenses.name as license_name',
            'provinces.name as province_name',
            'cities.name as city_name',
            'districts.name as district_name',
            'sub_districts.name as sub_district_name',
            'postal_codes.postal_code as postal_code',
            'religions.name as religion_name'
        );

        return DataTables::of($students)
            ->addIndexColumn()
            ->addColumn('license_type', fn ($s) => $s->license_type ?? '-')
            ->addColumn('license_name', fn ($s) => $s->license_name ?? '-')
            ->addColumn('religion_name', fn ($s) => $s->religion_name ?? '-')
            ->addColumn('province_name', fn ($s) => $s->province_name ?? '-')
            ->addColumn('city_name', fn ($s) => $s->city_name ?? '-')
            ->addColumn('district_name', fn ($s) => $s->district_name ?? '-')
            ->addColumn('sub_district_name', fn ($s) => $s->sub_district_name ?? '-')
            ->addColumn('postal_code', fn ($s) => $s->postal_code ?? '-')
            ->addColumn('gender', fn($row) => $this->readableGender($row->gender))
            ->addColumn('where_know', fn($row) => $this->readableInfo($row->where_know))
            ->addColumn('birth_date', fn($row) => $row->birth_date ? Carbon::parse($row->birth_date)->format('d/m/Y') : '-')
            ->addColumn('registered_date', fn($row) => $row->registered_date ? Carbon::parse($row->registered_date)->format('d/m/Y') : '-')
            ->editColumn('fullname', function ($row) {
                    $url = route('students.show', $row->id); 
                    return '<a href="'.$url.'">'.e($row->fullname).'</a>';
                })
            ->addColumn('action', function ($s) {
                        $buttons = '';
                        if (auth()->user()->can('siswa.ubah')) {
                            $buttons .= '<a href="' . route('students.edit', $s) . '" class="btn btn-icon btn-sm btn-warning me-1" title="Ubah">
                                            <i class="ti ti-edit"></i>
                                        </a>';
                        }
                        if (auth()->user()->can('siswa.lihat')) {
                            $buttons .= '<a href="' . route('students.show', $s) . '" class="btn btn-icon btn-sm btn-info me-1" title="Lihat">
                                            <i class="ti ti-eye"></i>
                                        </a>';
                        }
                        if (auth()->user()->can('siswa.hapus')) {
                            $buttons .= '<button data-id="' . $s . '" class="btn btn-icon btn-sm btn-danger delete-student" title="Hapus">
                                            <i class="ti ti-trash"></i>
                                        </button>';
                        }
                        return $buttons;
            })
            ->rawColumns(['action', 'fullname'])
            ->make(true);
        }

            return view('students.index');
    }

    public function create()
    {
        $user = auth()->user();
                if ($user->hasRole('Super-Admin')) {
    $licenses = License::all();

} elseif ($user->hasRole('Pemilik Lisensi')) {
    // Lisensi langsung terhubung ke user
    $licenses = $user->licenses ?? collect();

} elseif ($user->hasRole('Akuntan')) {
    // Lisensi diambil dari relasi employee
    $licenses = $user->employee?->licenses ?? collect();

} else {
    $licenses = collect(); // role lain tidak punya lisensi
}

        $religions = Religion::all();
         
        $provinces = Province::all();
        
        return view('students.create', compact('religions', 'licenses', 'provinces'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'nis' => 'required|string|unique:students',
        'license_id' => 'required|exists:licenses,id',
        'fullname' => 'required|string',
        'nickname' => 'nullable|string',
        'gender' => 'required|in:1,2',
        'birth_place' => 'nullable|string',
        'birth_date' => 'required|date',
        'age' => 'nullable|integer|min:0',
        'religion_id' => 'required|exists:religions,id',
        'email' => 'nullable|email|unique:students,email',
        'address' => 'nullable|string',
        'province_id' => 'nullable|exists:provinces,id',
        'city_id' => 'nullable|exists:cities,id',
        'district_id' => 'nullable|exists:districts,id',
        'sub_district_id' => 'nullable|exists:sub_districts,id',
        'postal_code_id' => 'nullable|exists:postal_codes,id',
        'father_name' => 'nullable|string',
        'father_phone' => 'nullable|string',
        'mother_name' => 'nullable|string',
        'mother_phone' => 'nullable|string',
        'student_phone' => 'nullable|string',
        'previous_school' => 'nullable|string',
        'grade' => 'nullable|string',
        'status' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'registered_date' => ['required', 'date_format:Y-m-d'],
        'where_know' => 'nullable|in:1,2,3,4,5,6,7,8,9',
    ]);

     if ($request->birth_date) {
        $validated['age'] = Carbon::parse($request->birth_date)->age;
    }

    // Generate NIS jika belum tersedia atau AJAX gagal
    if (empty($validated['nis']) || $validated['nis'] === 'AUTO') {
        $validated['nis'] = $this->generateNis($validated['license_id']);
    }

    if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('photos', $filename, 'public');
            $validated['photo'] = $filename;
        }

        // Buat akun user
    $user = User::create([
        'name' => $validated['fullname'],
        'email' => $validated['email'],
        'password' => Hash::make('password123'), // default password
    ]);

    // Assign role Student (jika pakai Spatie)
    $user->syncRoles('Siswa');

    // Buat student & hubungkan ke user
    $student = Student::create(array_merge(
        $validated,
        ['user_id' => $user->id]
    ));

    return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan');
}

    public function generateNisAjax($licenseId)
{
    $nis = $this->generateNis($licenseId); // pakai helper internal
    return response()->json(['nis' => $nis]);
}

private function generateNis($licenseId)
{
    $license = License::findOrFail($licenseId);

    // Asumsikan id lisensi kamu itu angka seperti: 3379
    $prefix = str_pad($license->license_id, 4, '0', STR_PAD_LEFT); // jadi 4 digit

    $prefix .= '02'; // tambahkan 01 setelah id lisensi

    // Ambil NIK terakhir yang sesuai prefix ini
    $lastNis = Student::where('nis', 'like', $prefix . '%')
        ->orderByDesc('nis')
        ->first();

    $nextNumber = 1;
    if ($lastNis) {
        $lastNumber = (int)substr($lastNis->nis, strlen($prefix)); // ambil 4 digit akhir
        $nextNumber = $lastNumber + 1;
    }

    return $prefix . str_pad($nextNumber, 4, '0', STR_PAD_LEFT); // ex: 3379010001
}

    public function show(Student $student)
    {

        $student->load(['religion', 'user.licenses', 'province', 'city', 'district', 'subDistrict', 'postalCode']);
        return view('students.show', compact('student'));
    }

    public function showProfile($id)
    {
    $student = Student::with(['user.licenses', 'religion'])->findOrFail($id);
    return view('students.tab.profile', compact('student'));
    }

    public function showTab($id)
{
    $student = Student::with('educations')->findOrFail($id);
    return view('students.tab.educations', compact('student'));
}

    public function edit(Student $student)
{
    $student->load('license');
    $user = auth()->user();

    if ($user->hasRole('Super-Admin')) {
        $licenses = License::all();

    } elseif ($user->hasRole('Pemilik Lisensi')) {
        $licenses = $user->licenses ?? collect();

    } elseif ($user->hasRole('Akuntan')) {
        $licenses = $user->employee?->licenses ?? collect();

    } else {
        $licenses = collect();
    }

    // Data lain tetap di-load untuk semua role
    $religions = Religion::all();
    $provinces = Province::all();
    $cities = City::where('province_id', $student->province_id)->get();
    $districts = District::where('city_id', $student->city_id)->get();
    $subDistricts = SubDistrict::where('district_id', $student->district_id)->get();
    $postalCodes = PostalCode::where('sub_district_id', $student->sub_district_id)->get();

    return view('students.edit', compact(
        'student',
        'licenses',
        'religions',
        'provinces',
        'cities',
        'districts',
        'subDistricts',
        'postalCodes'
    ));
}

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
        'nis' => [
            'required',
            'string',
            Rule::unique('students')->ignore($student->id),
        ],
        'license_id' => 'required|exists:licenses,id',
        'fullname' => 'required|string',
        'nickname' => 'nullable|string',
        'gender' => 'required|in:1,2',
        'birth_place' => 'nullable|string',
        'birth_date' => 'required|date',
        'age' => 'nullable|integer|min:0',
        'religion_id' => 'required|exists:religions,id',
        'email' => [
            'nullable',
            'email',
             Rule::unique('students')->ignore($student->id),
            ], 
        'address' => 'nullable|string',
        'province_id' => 'nullable|exists:provinces,id',
        'city_id' => 'nullable|exists:cities,id',
        'district_id' => 'nullable|exists:districts,id',
        'sub_district_id' => 'nullable|exists:sub_districts,id',
        'postal_code_id' => 'nullable|exists:postal_codes,id',
        'father_name' => 'required|string',
        'father_phone' => 'required|string',
        'mother_name' => 'required|string',
        'mother_phone' => 'required|string',
        'student_phone' => 'nullable|string',
        'previous_school' => 'nullable|string',
        'grade' => 'nullable|string',
        'status' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'registered_date' => ['required', 'date_format:Y-m-d'],
        'where_know' => 'nullable|in:1,2,3,4,5,6,7,8,9',
    ]);

        $validated['age'] = Carbon::parse($request->birth_date)->age;
    

    // Jika ada file baru
            if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
                if ($student->photo && Storage::disk('public')->exists('photos/' . $student->photo)) {
                Storage::disk('public')->delete('photos/' . $student->photo);
                }

            // Simpan file baru
            $file = $request->file('photo');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('photos', $filename, 'public');
            $validated['photo'] = $filename;
        }

        $student->update($validated);

        if ($student->user) {
            $student->user->update([
                'name'  => $student->fullname,
                'email' => $student->email,
            ]);
        }

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if ($student) {
            $student->delete();
            return response()->json(['status' => 'success', 'message' => 'Student deleted successfully']);
        }

        return response()->json(['status' => 'failed', 'message' => 'Unable to delete']);
    }
}
