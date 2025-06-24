<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LicenseHolder;
use App\Models\LicenseHolderEducation;

class LicenseHolderEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    /**
     * Show the form for creating a new resource.
     */
   public function create(Request $request)
{
    $license_holder_id = $request->query('license_holder_id');

    $license_holder = LicenseHolder::findOrFail($license_holder_id);

    return view('license_holder_educations.create', compact('license_holder'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'license_holder_id' => 'required|exists:license_holders,id',
        'education_level' => 'required|string|max:50',
        'institution_name' => 'required|string|max:255',
        'major' => 'nullable|string|max:100',
        'start_year' => 'required|integer',
        'end_year' => 'nullable|integer',
        'is_graduated' => 'required|boolean',
    ]);

    LicenseHolderEducation::create($validated);

    return redirect()
        ->route('license_holders.show', $request->license_holder_id)
        ->with('tab', 'educations')
        ->with('success', 'Riwayat pendidikan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $education = LicenseHolderEducation::findOrFail($id);
        $license_holder = $education->license_holder;

        return view('license_holder_educations.edit', compact('education', 'license_holder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'education_level' => 'required|string|max:50',
        'institution_name' => 'required|string|max:255',
        'major' => 'nullable|string|max:100',
        'start_year' => 'required|integer',
        'end_year' => 'nullable|integer',
        'is_graduated' => 'required|boolean',
        ]);

        $education = LicenseHolderEducation::findOrFail($id);
        $education->update($validated);

        return redirect()
        ->route('license_holders.show', $education->license_holder_id)
        ->with('success', 'Riwayat pendidikan berhasil diperbarui.')
        ->with('tab', 'educations');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $education = LicenseHolderEducation::findOrFail($id);
        $license_holder_id = $education->license_holder_id;
        $education->delete();

        return redirect()
            ->route('license_holders.show', $education->license_holder_id)
            ->with('success', 'Berhasil hapus data')
            ->with('tab', 'educations');

    }
}
