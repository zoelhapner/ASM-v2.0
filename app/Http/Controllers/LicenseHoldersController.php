<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Religion;
use App\Models\License;
use App\Models\LicenseHolder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class LicenseHoldersController extends Controller
{
    private function readableLanguage($value)
    {
        return match ((int)$value) {
            1 => 'Lancar',
            2 => 'Tidak Lancar',
            default => '-',
        };
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $license_holder = LicenseHolder::with(['religion', 'license']);

            return Datatables::eloquent($license_holder)

            ->addColumn('religion_name', fn($row) => $row->religion->name ?? '-')
            ->addColumn('license_id', fn($row) => $row->license->license_id ?? '-')
            ->addColumn('license_name', fn($row) => $row->license->name ?? '-')

            ->addColumn('indonesian_literacy', function ($row) {
                    return $this->readableLanguage($row->indonesian_literacy);
                })
            ->addColumn('indonesian_proficiency', function ($row) {
                    return $this->readableLanguage($row->indonesian_proficiency);
                })
            ->addColumn('arabic_literacy', function ($row) {
                    return $this->readableLanguage($row->arabic_literacy);
                })
            ->addColumn('arabic_proficiency', function ($row) {
                    return $this->readableLanguage($row->arabic_proficiency);
                })
            ->addColumn('english_literacy', function ($row) {
                    return $this->readableLanguage($row->english_literacy);
                })
            ->addColumn('english_proficiency', function ($row) {
                    return $this->readableLanguage($row->english_proficiency);
                })

            ->addColumn('birth_date', function($row) {
                return Carbon::parse($row->birth_date)->format('d/m/Y');
            })

            ->addColumn('married_date', function ($row) {
                return $row->married_date ? Carbon::parse($row->married_date)->format('d/m/Y') : '-';
            })


            ->addColumn('action', function($license_holder) {
                $editUrl = route('license_holders.edit', $license_holder->id);
                $showUrl = route('license_holders.show', $license_holder->id);

                return ' 
                    <a href="'.$editUrl.'" class="btn btn-success btn-sm">Edit</a>
                    <a href="'.$showUrl.'" class="btn btn-secondary btn-sm">Show</a>
                    <button data-id="'.$license_holder->id.'" class="btn btn-danger btn-sm delete-license_holder">Delete</button>
                '; 
            })

            ->rawColumns(['action'])
            ->make(true);
        }

        return view('license_holders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $religions = Religion::all();
        $licenses = License::all(); // ambil semua lisensi
        return view('license_holders.create', compact('religions', 'licenses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'license_id' => 'required|exists:licenses,id', 
            'name' => 'required',
            'religion_id' => 'required|exists:religions,id',
            'identity_number' => 'required|digits:16',
            'driver_license_number' => 'nullable|string|max:20',
            'birth_place' => 'required',
            'birth_date' => ['required', 'date_format:Y-m-d'],
            'address' => 'required',
            'phone' => 'required',
            'hobby' => 'required',
            'marital_status' => 'required|in:1,2,3',
            'married_date' => ['nullable', 'date_format:Y-m-d'],
            'indonesian_literacy' => 'nullable|in:1,2,3',
            'indonesian_proficiency' => 'nullable|in:1,2,3',
            'arabic_literacy' => 'nullable|in:1,2,3',
            'arabic_proficiency' => 'nullable|in:1,2,3',
            'english_literacy' => 'nullable|in:1,2,3',
            'english_proficiency' => 'nullable|in:1,2,3',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('photos', $filename, 'public');
            $validated['photo'] = $filename;
        }


        LicenseHolder::create($validated);
             

        return redirect()->route('license_holders.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(LicenseHolder $license_holder)
    {

        $license_holder->load(['religion', 'license']);
        return view('license_holders.show', compact('license_holder'));
    }

    public function showProfile($id)
    {
    $license_holder = LicenseHolder::with(['license', 'religion'])->findOrFail($id);
    return view('license_holders.tab.profile', compact('license_holder'));
    }

    public function showTab($id)
{
    $license_holder = LicenseHolder::with('educations')->findOrFail($id);
    return view('license_holders.tab.educations', compact('license_holder'));
}

    public function showWorks($id)
{
    $license_holder = LicenseHolder::with('workers')->findOrFail($id);
    return view('license_holders.tab.workers', compact('license_holder'));
}

    public function showFams($id)
{
    $license_holder = LicenseHolder::with('families')->findOrFail($id);
    return view('license_holders.tab.families', compact('license_holder'));
}

    public function edit(LicenseHolder $license_holder)
    {
        $religions = Religion::all();
        $licenses = License::all(); // ambil semua lisensi
        return view('license_holders.edit', compact('license_holder','religions', 'licenses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LicenseHolder $license_holder)
    {
        $validated = $request->validate([
            'license_id' => 'required|exists:licenses,id', 
            'name' => 'required',
            'religion_id' => 'required|exists:religions,id',
            'identity_number' => 'required|digits:16',
            'driver_license_number' => 'nullable|string|max:20',
            'birth_place' => 'required',
            'birth_date' => ['required', 'date_format:Y-m-d'],
            'address' => 'required',
            'phone' => 'required',
            'hobby' => 'required',
            'marital_status' => 'required|in:1,2,3',
            'married_date' => ['nullable', 'date_format:Y-m-d'],
            'indonesian_literacy' => 'nullable|in:1,2,3',
            'indonesian_proficiency' => 'nullable|in:1,2,3',
            'arabic_literacy' => 'nullable|in:1,2,3',
            'arabic_proficiency' => 'nullable|in:1,2,3',
            'english_literacy' => 'nullable|in:1,2,3',
            'english_proficiency' => 'nullable|in:1,2,3',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

            // Jika ada file baru
            if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
                if ($license_holder->photo && Storage::disk('public')->exists('photos/' . $license_holder->photo)) {
                Storage::disk('public')->delete('photos/' . $license_holder->photo);
                }

            // Simpan file baru
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('photos', $filename, 'public');
            $validated['photo'] = $filename;
        }

            $license_holder->update($validated);
            return redirect()->route('license_holders.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LicenseHolder $license_holder)
    {
         if ($license_holder) {
            $license_holder->delete();
            return response()->json(['status' => 'success', 'message' => 'License deleted successfully']);
        }

        return response()->json(['status' => 'failed', 'message' => 'Unable to delete']);
    }
}
