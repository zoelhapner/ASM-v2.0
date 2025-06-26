<?php
   
namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\PostalCode;
use Illuminate\Http\Request;
use App\Models\License;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

 
class LicensesController extends Controller
{
    
    public function index(Request $request) {
    
        if ($request->ajax()) {

            $licenses = License::with(['province', 'city', 'district', 'subDistrict', 'postalCode']);
            $buildingTypes = [1 => 'Ruko', 2 => 'Gedung', 3 => 'Rumah'];
            $buildingStatuses = [1 => 'Milik Sendiri', 2 => 'Sewa'];
            $buildingConditions = [1 => 'Baik', 2 => 'Perlu Renovasi', 3 => 'Rusak Berat'];

            return Datatables::eloquent($licenses)

            ->addColumn('province_name', fn($row) => $row->province->name ?? '-')
            ->addColumn('city_name', fn($row) => $row->city->name ?? '-')
            ->addColumn('district_name', fn($row) => $row->district->name ?? '-')
            ->addColumn('sub_district_name', fn($row) => $row->subDistrict->name ?? '-')
            ->addColumn('postal_code', fn($row) => $row->postalCode->postal_code ?? '-')
            ->editColumn('building_type', fn($row) => $buildingTypes[$row->building_type] ?? 'Tidak Diketahui')
            ->editColumn('building_status', fn($row) => $buildingStatuses[$row->building_status] ?? 'Tidak Diketahui')
            ->editColumn('building_condition', fn($row) => $buildingConditions[$row->building_condition] ?? 'Tidak Diketahui')

            ->addColumn('instagram', function ($row) {
                if ($row->instagram) {
                    return '<a href="' . e($row->instagram) . '" target="_blank" title="Lihat Instagram"><i class="ti ti-check text-success"></i></a>';
                } else {
                    return '<i class="ti ti-minus text-muted"></i>';
                }
            })

            ->addColumn('facebook_page', function ($row) {
                if ($row->facebook_page) {
                    return '<a href="' . e($row->facebook_page) . '" target="_blank" title="Lihat Facebook"><i class="ti ti-check text-success"></i></a>';
                } else {
                    return '<i class="ti ti-minus text-muted"></i>';
                }
            })

            ->addColumn('tiktok', function ($row) {
                if ($row->tiktok) {
                    return '<a href="' . e($row->tiktok) . '" target="_blank" title="Lihat Tiktok"><i class="ti ti-check text-success"></i></a>';
                } else {
                    return '<i class="ti ti-minus text-muted"></i>';
                }
            })

            ->addColumn('youtube', function ($row) {
                if ($row->youtube) {
                    return '<a href="' . e($row->yotube) . '" target="_blank" title="Lihat Yotube"><i class="ti ti-check text-success"></i></a>';
                } else {
                    return '<i class="ti ti-minus text-muted"></i>';
                }
            })

            ->addColumn('google_maps', function ($row) {
                if ($row->google_maps) {
                    return '<a href="' . e($row->google_maps) . '" target="_blank" title="Lihat Maps"><i class="ti ti-check text-success"></i></a>';
                } else {
                    return '<i class="ti ti-minus text-muted"></i>';
                }
            })

            ->addColumn('landing_page_student_registration', function ($row) {
                if ($row->landing_page_student_registration) {
                    return '<a href="' . e($row->landing_page_student_registration) . '" target="_blank" title="Lihat Landing Page"><i class="ti ti-check text-success"></i></a>';
                } else {
                    return '<i class="ti ti-minus text-muted"></i>';
                }
            })

            ->addColumn('join_date', function($row) {
                return Carbon::parse($row->join_date)->format('d/m/Y');
            })

            ->addColumn('expired_date', function ($row) {
                return $row->expired_date ? Carbon::parse($row->expired_date)->format('d/m/Y') : '-';
            })

            ->addColumn('building_rent_expired_date', function($row) {
                return $row->building_rent_expired_date ? Carbon::parse($row->building_rent_expired_date)->format('d/m/Y') : '-';
            })

            ->addColumn('status', function ($row) {
                $status = strtolower($row->status);

                $color = match ($status) {
                    'active' => 'success',     // hijau
                    'inactive' => 'warning',   // kuning
                    'expired' => 'danger',     // merah
                    default => 'secondary',
                };

                return '<span class="badge bg-' . $color . '">' . ucfirst($row->status) . '</span>';
            })


            ->addColumn('action', function($license) {
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

    public function create() 
    {
        $provinces = Province::all();
        return view('licenses.create', compact('provinces'));
    }

    public function store(Request $request) {
    
        $request->validate([
            'license_id' => 'required',
            'license_type' => 'required|in:FO,SO,LO,LC', 
            'name' => 'required',
            'email' => 'required|email',
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

        License::create([
            'license_id' => $request->license_id,
            'license_type' => $request->license_type,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'sub_district_id' => $request->sub_district_id,
            'postal_code_id' => $request->postal_code_id,
            'phone' => $request->phone,
            'join_date' => $request->join_date,
            'expired_date' => $request->expired_date,
            'contract_agreement_number' => $request->contract_agreement_number,
            'status' => $request->status,
            'building_type' => $request->building_type,
            'building_status' => $request->building_status,
            'building_rent_expired_date' => $request->building_rent_expired_date,
            'building_area' => $request->building_area,
            'building_condition' => $request->building_condition,
            'building_has_ac' => $request->building_has_ac,
            'instagram' => $request->instagram,
            'facebook_page' => $request->facebook_page,
            'tiktok' => $request->tiktok,
            'youtube' => $request->youtube,
            'google_maps' => $request->google_maps,
            'landing_page_student_registration' => $request->landing_page_student_registration,
        ]);

        return redirect()->route('licenses.index')->with('success', 'Data berhasil ditambahkan.');
    }

     public function edit(License $license) {

        $provinces = Province::all();
        $cities = City::where('province_id', $license->province_id)->get();
        $districts = District::where('city_id', $license->city_id)->get();
        $subDistricts = SubDistrict::where('district_id', $license->district_id)->get();
        $postalCodes = PostalCode::where('sub_district_id', $license->sub_district_id)->get();

        return view('licenses.edit', compact('license', 'provinces', 'cities', 'districts', 'subDistricts', 'postalCodes'));
    }

    public function update(Request $request, License $license) {
        
       $validated = $request->validate([
            'license_id' => 'required',
            'license_type' => 'required|in:FO,SO,LO,LC', 
            'name' => 'required',
            'email' => 'required|email',
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

        $license->update($validated);
        return redirect()->route('licenses.index')->with('success', 'Data berhasil diperbarui.');

    }

    public function destroy(License $license) {
    
        if ($license) {
            $license->delete();
            return response()->json(['status' => 'success', 'message' => 'License deleted successfully']);
        }

        return response()->json(['status' => 'failed', 'message' => 'Unable to delete']);
    }


}