<?php
   
namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\PostalCode;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\License;
use App\Models\AccountingAccount;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;

 
class LicensesController extends Controller
{
    
    public function index(Request $request) 
    {

        if ($request->ajax()) {
            $licenses = $this->getFilteredLicenses();

            $buildingTypes = [1 => 'Ruko', 2 => 'Gedung', 3 => 'Rumah'];
            $buildingStatuses = [1 => 'Milik Sendiri', 2 => 'Sewa'];
            $buildingConditions = [1 => 'Baik', 2 => 'Perlu Renovasi', 3 => 'Rusak Berat'];

            return DataTables::of($licenses)
                ->addColumn('province_name', fn($row) => $row->province->name ?? '-')
                ->addColumn('city_name', fn($row) => $row->city->name ?? '-')
                ->addColumn('district_name', fn($row) => $row->district->name ?? '-')
                ->addColumn('sub_district_name', fn($row) => $row->subDistrict->name ?? '-')
                ->addColumn('postal_code', fn($row) => $row->postalCode->postal_code ?? '-')
                ->editColumn('building_type', fn($row) => $buildingTypes[$row->building_type] ?? 'Tidak Diketahui')
                ->editColumn('building_status', fn($row) => $buildingStatuses[$row->building_status] ?? 'Tidak Diketahui')
                ->editColumn('building_condition', fn($row) => $buildingConditions[$row->building_condition] ?? 'Tidak Diketahui')
                ->addColumn('instagram', fn($row) => $this->linkOrDash($row->instagram))
                ->addColumn('facebook_page', fn($row) => $this->linkOrDash($row->facebook_page))
                ->addColumn('tiktok', fn($row) => $this->linkOrDash($row->tiktok))
                ->addColumn('youtube', fn($row) => $this->linkOrDash($row->youtube))
                ->addColumn('google_maps', fn($row) => $this->linkOrDash($row->google_maps))
                ->addColumn('landing_page_student_registration', fn($row) => $this->linkOrDash($row->landing_page_student_registration))
                ->addColumn('join_date', fn($row) => Carbon::parse($row->join_date)->format('d/m/Y'))
                ->addColumn('expired_date', fn($row) => $row->expired_date ? Carbon::parse($row->expired_date)->format('d/m/Y') : '-')
                ->addColumn('building_rent_expired_date', fn($row) => $row->building_rent_expired_date ? Carbon::parse($row->building_rent_expired_date)->format('d/m/Y') : '-')
                ->addColumn('status', function ($row) {
                    $color = match (strtolower($row->status)) {
                        'active' => 'success', 'inactive' => 'warning', 'expired' => 'danger',
                        default => 'secondary',
                    };
                    return '<span class="badge bg-' . $color . '">' . ucfirst($row->status) . '</span>';
                })
                ->addColumn('action', function ($license) {
                    $buttons = '';
                    if (auth()->user()->can('lisensi.ubah')) {
                        $buttons .= '<a href="' . route('licenses.edit', $license->id) . '" class="btn btn-success btn-sm">Edit</a> ';
                    }
                    if (auth()->user()->can('lisensi.hapus')) {
                        $buttons .= '<button data-id="' . $license->id . '" class="btn btn-danger btn-sm delete-license">Delete</button>';
                    }
                    return $buttons;
                })
                ->rawColumns(['action', 'status', 'instagram', 'facebook_page', 'tiktok', 'youtube', 'google_maps', 'landing_page_student_registration'])
                ->make(true);
        }

        return view('licenses.index');
    
    }

        private function getFilteredLicenses()
    {
        $auth = auth()->user();

        $query = License::query()
        ->with(['province', 'city', 'district', 'subDistrict', 'postalCode'])
         ->when($auth->hasRole('Pemilik Lisensi'), function ($query) use ($auth) {
            $query->whereHas('owners', function ($query) use ($auth) {
                $query->where('users.id', $auth->id);
            });
        })
        ->orderBy('id', 'desc');


        return $query->get();
    }

    private function linkOrDash($url)
    {
        return $url ? '<a href="' . e($url) . '" target="_blank" title="Lihat"><i class="ti ti-check text-success"></i></a>' : '<i class="ti ti-minus text-muted"></i>';
    }

    public function create() 
    {
        $provinces = Province::all();
        $owners = \App\Models\User::role('Pemilik Lisensi')->get();
        return view('licenses.create', compact('provinces', 'owners'));
    }

    public function store(Request $request) {
    
        $validated = $request->validate([
            'license_id' => 'required|unique:licenses,license_id',
            'license_type' => 'required|in:FO,SO,LO,LC', 
            'name' => 'required|unique:licenses,name',
            'email' => 'required|email|unique:licenses,email',
            'address' => 'required',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
            'sub_district_id' => 'required|exists:sub_districts,id',
            'postal_code_id' => 'required|exists:postal_codes,id',
            'phone' => 'required',
            'join_date' => ['required', 'date_format:Y-m-d'],
            'expired_date' => ['required', 'date_format:Y-m-d'],
            'contract_agreement_number' => 'required',
            'status' => 'required|in:active,inactive,expired',
            'building_type' => 'nullable|in:1,2,3',
            'building_status' => 'nullable|in:1,2,3',
            'building_rent_expired_date' => ['nullable', 'date_format:Y-m-d'],
            'building_area' => 'nullable|numeric|min:0',
            'building_condition' => 'nullable|in:1,2,3',
            'building_has_ac' => 'nullable|boolean',
            'instagram' => 'nullable|url',
            'facebook_page' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'youtube' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'landing_page_student_registration' => 'nullable|url',
        ]);

        $license = License::create($validated);
        
        return redirect()->route('licenses.index')->with('success', 'Data berhasil ditambahkan.');
    }

     public function edit(License $license) {
         $owners = User::role('Pemilik Lisensi')->get();

        // Jika yang login Owner, pastikan dia hanya boleh buka lisensi miliknya.
        if (auth()->user()->hasRole('Pemilik Lisensi')) {
            if (!$license->owners->contains(auth()->id())) {
                abort(403, 'Anda tidak memiliki izin mengedit lisensi ini.');
            }
        }

        $provinces = Province::all();
        $cities = City::where('province_id', $license->province_id)->get();
        $districts = District::where('city_id', $license->city_id)->get();
        $subDistricts = SubDistrict::where('district_id', $license->district_id)->get();
        $postalCodes = PostalCode::where('sub_district_id', $license->sub_district_id)->get();
        $owners = \App\Models\User::role('Pemilik Lisensi')->get();

        return view('licenses.edit', compact('license', 'provinces', 'cities', 'districts', 'subDistricts', 'postalCodes', 'owners'));
    }

    public function update(Request $request, License $license) {
        
       $validated = $request->validate([
            'license_id' => [
            'required',
            Rule::unique('licenses', 'license_id')->ignore($license->id),
            ],
            'license_type' => 'required|in:FO,SO,LO,LC', 
            'name' => 'required|unique:licenses,name',
            'email' => [
            'required',
            'email',
             Rule::unique('licenses')->ignore($license->id),
            ], 
            'address' => 'required',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
            'sub_district_id' => 'required|exists:sub_districts,id',
            'postal_code_id' => 'required|exists:postal_codes,id',
            'phone' => 'required',
            'join_date' => ['required', 'date_format:Y-m-d'],
            'expired_date' => ['required', 'date_format:Y-m-d'],
            'contract_agreement_number' => 'required',
            'status' => 'required|in:active,inactive,expired',
            'building_type' => 'nullable|in:1,2,3',
            'building_status' => 'nullable|in:1,2,3',
            'building_rent_expired_date' => ['nullable', 'date_format:Y-m-d'],
            'building_area' => 'nullable|numeric|min:0',
            'building_condition' => 'nullable|in:1,2,3',
            'building_has_ac' => 'nullable|boolean',
            'instagram' => 'nullable|url',
            'facebook_page' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'youtube' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'landing_page_student_registration' => 'nullable|url',
            'owner' => 'required|exists:users,id',
    ]);

        $license->update($validated);

         if (auth()->user()->hasRole('Pemilik Lisensi')) {
            // Kalau Owner → pastikan tetap dia sendiri
            $license->owners()->sync([auth()->id()]);
        } else {
            // Kalau Admin → bisa update owners
            if ($request->filled('owners')) {
                $license->owners()->sync($request->owners);
            }
        }

        return redirect()->route('licenses.index')->with('success', 'Data berhasil diperbarui.');

    }

    public function destroy(License $license) 
    {
        if (auth()->user()->hasRole('Pemilik Lisensi')) {
        abort(403);
        }
    
        if ($license) {
            $license->delete();
            return response()->json(['status' => 'success', 'message' => 'License deleted successfully']);
        }

        return response()->json(['status' => 'failed', 'message' => 'Unable to delete']);
    }


}