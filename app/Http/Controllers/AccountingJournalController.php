<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountingJournalRequest;
use App\Http\Requests\UpdateAccountingJournalRequest;
use App\Models\AccountingJournal;
use App\Models\AccountingJournalDetail;
use App\Models\AccountingAccount;
use App\Models\AccountingPeriod;
use App\Models\License;
use App\Models\Student;
use App\Models\Employee;
use App\Models\LicenseHolder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AccountingJournalController extends Controller
{
    public function index()
{
    $user = Auth::user();

    $journals = AccountingJournal::with('license')
        ->when(!$user->hasRole('Super-Admin'), function ($query) use ($user) {
            // Untuk Pemilik Lisensi atau Akuntan
            $licenses = $user->hasRole('Pemilik Lisensi')
                ? $user->licenses
                : $user->employee?->licenses;

            abort_if(!$licenses || $licenses->isEmpty(), 403, 'Lisensi tidak ditemukan.');

            $query->whereIn('license_id', $licenses->pluck('id'));
        })
        ->when(session()->has('active_license_id'), function ($query) {
            // Filter berdasarkan lisensi aktif di navbar
            $query->where('license_id', session('active_license_id'));
        })
        ->orderByDesc('transaction_date')
        ->get();

    return view('journals.index', compact('journals'));
}

    public function create(Request $request)
{
    $user = Auth::user();

    if ($user->hasRole('Super-Admin')) {
        $licenses = License::all();
        $activeLicenseId = $request->get('license_id'); // Ambil dari filter form
    } else {
        $licenses = $user->hasRole('Pemilik Lisensi')
            ? $user->licenses
            : $user->employee?->licenses;

        if (!$licenses || $licenses->isEmpty()) {
            abort(403, 'License tidak ditemukan untuk user ini.');
        }

        $activeLicenseId = session('active_license_id');
    }

    // Tentukan daftar license_id untuk query
    $licenseIds = $activeLicenseId
        ? [(string) $activeLicenseId]
        : $licenses->pluck('id')->toArray();

    // Ambil akun yang disembunyikan sesuai role user
    $hiddenAccounts = [];
    foreach ($user->getRoleNames() as $role) {
        if (isset(config('accounting.hidden_accounts')[$role])) {
            $hiddenAccounts = array_merge(
                $hiddenAccounts,
                config('accounting.hidden_accounts')[$role]
            );
        }
    }

    // Accounts
    $accounts = AccountingAccount::where('is_parent', false)
        ->where('is_active', true)
        ->when($activeLicenseId, fn ($q) => $q->where('license_id', $activeLicenseId))
        ->when(!$user->hasRole('Super-Admin'), fn($q) => $q->whereIn('license_id', $licenseIds))
        ->when(!empty($hiddenAccounts), function ($q) use ($hiddenAccounts) {
            $q->whereNotIn('account_code', $hiddenAccounts);
        })
        ->orderBy('account_code')
        ->get();

    // Students
    $students = Student::whereIn('license_id', $licenseIds)
        ->select('id', 'fullname as name')
        ->get();

    // Employees
    $employees = Employee::whereHas('licenses', function ($q) use ($licenseIds) {
            $q->whereIn('employee_license.license_id', $licenseIds);
        })
        ->select('id', 'fullname as name')
        ->get();

    $licenseList = License::whereIn('license_id', $licenseIds)
        ->select('id', 'name')
        ->get();

    // $pusatLicense = License::where('name', 'AHA Right Brain')->first();

    // $pusatUserId = null;
    // $pusatUserName = null;

    // if ($pusatLicense) {
    //     // Ambil salah satu user yang punya license ini
    //     $pusatUser = $pusatLicense->owners()->first(); // pastikan relasi users() ada di model License
    //     if ($pusatUser) {
    //         $pusatUserId = $pusatUser->id;
    //         $pusatUserName = $pusatUser->name;
    //     }
    // }

    $pusatLicense = License::where('name', 'AHA Right Brain')->first();

    $pusatUserId   = $pusatLicense?->pusatUser()?->id;
    $pusatUserName = $pusatLicense?->pusatUser()?->name;

    return view('journals.create', compact(
        'accounts', 'licenses', 'activeLicenseId', 'students', 'employees', 'licenseList', 'pusatUserId', 'pusatUserName'

    ));
}

public function store(StoreAccountingJournalRequest $request)
{
    $user = Auth::user();
    $licenseId = $request->license_id;

    $cabangLicense = License::find($licenseId);

    // Hitung total debit/credit (kalau mau validasi balance)
    $totalDebit = collect($request->details)->sum('debit');
    $totalCredit = collect($request->details)->sum('credit');

    // 1. Simpan jurnal di CABANG
    $journal = AccountingJournal::create([
        'license_id' => $licenseId,
        'journal_code' => 'JRN-' . strtoupper(Str::random(5)),
        'transaction_date' => $request->transaction_date,
        'description' => $request->description,
        'created_by' => $user->id,
    ]);

    foreach ($request->details as $detail) {
        AccountingJournalDetail::create([
            'journal_id' => $journal->id,
            'account_id' => $detail['account_id'],
            'person' => $detail['person'] ?? null,
            'debit' => $detail['debit'] ?? 0,
            'credit' => $detail['credit'] ?? 0,
            'description' => $detail['description'] ?? null,
        ]);
    }

    // // 2. Kalau role Pemilik Lisensi, buat jurnal otomatis di PUSAT
    // if ($user->hasRole('Pemilik Lisensi', 'Akuntan') && $cabangLicense) {
    //     $pusatLicense = License::where('name', 'AHA Right Brain')->first();

    //     if ($pusatLicense) {

    //         /**
    //          * Mapping akun dari Cabang -> Pusat
    //          * Key = kode akun cabang
    //          * Value = kode akun pusat
    //          */
    //         $mappingAkun = [
    //             'K 0001' => 'D 0001', // contoh: Beban Perpanjangan Lisensi -> Pendapatan Perpanjangan Lisensi
    //             'K 0002' => 'D 0002',
    //             'K 0003' => 'D 0003',
    //             'K 0004' => 'D 0004',
    //         ];

    //         // Ambil detail yang akunnya termasuk dalam mapping
    //         $detailUntukPusat = collect($request->details)->filter(function ($detail) use ($mappingAkun) {
    //             $akunCabang = AccountingAccount::find($detail['account_id']);
    //             return $akunCabang && isset($mappingAkun[$akunCabang->account_code]);
    //         });

    //         if ($detailUntukPusat->isNotEmpty()) {
    //             // Buat jurnal di PUSAT
                

    //             $pusatJournal = AccountingJournal::create([
    //                 'license_id' => $pusatLicense->id,
    //                 'journal_code' => 'JRN-' . strtoupper(Str::random(5)),
    //                 'transaction_date' => $request->transaction_date,
    //                 'description' => 'Pendapatan dari cabang ' . ($cabangLicense->name ?? 'Tidak diketahui'),
    //                 'created_by' => null,
    //             ]);

    //             foreach ($detailUntukPusat as $detail) {
    //                 $akunCabang = AccountingAccount::find($detail['account_id']);
    //                 $kodeAkunPusat = $mappingAkun[$akunCabang->account_code];

    //                 // Cari akun pusat berdasarkan kode mapping
    //                 $akunPusat = AccountingAccount::where('license_id', $pusatLicense->id)
    //                     ->where('account_code', $kodeAkunPusat)
    //                     ->first();

    //                 if ($akunPusat) {
    //                     AccountingJournalDetail::create([
    //                         'journal_id' => $pusatJournal->id,
    //                         'account_id' => $akunPusat->id,
    //                         'person' => $cabangLicense->id,
    //                         'debit' => $detail['credit'] ?? 0,
    //                         'credit' => $detail['debit'] ?? 0, 
    //                         'description' => $detail['description'] ?? null,
    //                     ]);
    //                 }
    //             }
    //         }
    //     }
    // }

    if ($user->hasRole(['Pemilik Lisensi', 'Akuntan']) && $cabangLicense) {
    $pusatLicense = License::where('name', 'AHA Right Brain')->first();

    if ($pusatLicense) {
        // Mapping akun dari Cabang -> Pusat
        $mappingAkun = [
            'K 0001' => 'D 0001',
            'K 0002' => 'D 0002',
            'K 0003' => 'D 0003',
            'K 0004' => 'D 0004',
            'K 0005' => 'D 0005',
            'K 0006' => 'D 0006',
            'K 0007' => 'D 0007',
            'K 0008' => 'D 0008',
            'K 0013' => 'D 0009',
            'K 0014' => 'D 0010',
            'K 0015' => 'D 0011',
            'K 0016' => 'D 0012',
            'K 0021' => 'D 0013',
            'K 0022' => 'D 0014',
            'K 0023' => 'D 0015',
            'K 0024' => 'D 0016',
            'K 0029' => 'D 0017',
            'K 0031' => 'D 0018',
            'K 0034' => 'D 0022',
        ];

        // Ambil semua ID account_id dari request
        $accountIds = collect($request->details)->pluck('account_id')->unique();

        // Load semua akun cabang sekali
        $akunCabangList = AccountingAccount::whereIn('id', $accountIds)->get()->keyBy('id');

        // Filter detail yang masuk mapping
        $detailUntukPusat = collect($request->details)->filter(function ($detail) use ($akunCabangList, $mappingAkun) {
            $akunCabang = $akunCabangList->get($detail['account_id']);
            return $akunCabang && isset($mappingAkun[$akunCabang->account_code]);
        });

        if ($detailUntukPusat->isNotEmpty()) {
            // Load akun pusat sesuai mapping
            $kodeAkunPusatList = collect($mappingAkun)->values()->unique();
            $akunPusatList = AccountingAccount::where('license_id', $pusatLicense->id)
                ->whereIn('account_code', $kodeAkunPusatList)
                ->get()
                ->keyBy('account_code');

            // Buat jurnal pusat
            $pusatJournal = AccountingJournal::create([
                'license_id' => $pusatLicense->id,
                'journal_code' => 'JRN-' . strtoupper(Str::random(5)),
                'transaction_date' => $request->transaction_date,
                'description' => 'Pendapatan dari cabang ' . ($cabangLicense->name ?? 'Tidak diketahui'),
                'created_by' => null,
            ]);

            // Siapkan data untuk batch insert
            $detailInsert = [];

            foreach ($detailUntukPusat as $detail) {
                $akunCabang = $akunCabangList->get($detail['account_id']);
                $kodeAkunPusat = $mappingAkun[$akunCabang->account_code] ?? null;

                if ($kodeAkunPusat && isset($akunPusatList[$kodeAkunPusat])) {
                    $detailInsert[] = [
                        'id' => Str::uuid()->toString(),
                        'journal_id' => $pusatJournal->id,
                        'account_id' => $akunPusatList[$kodeAkunPusat]->id,
                        'person' => $cabangLicense->id,
                        'debit' => $detail['credit'] ?? 0,
                        'credit' => $detail['debit'] ?? 0,
                        'description' => $detail['description'] ?? null,
                    ];
                }
            }

            // Batch insert ke database
            if (!empty($detailInsert)) {
                AccountingJournalDetail::insert($detailInsert);
            }
        }
    }
}


    return redirect()->route('journals.index')->with('success', 'Jurnal berhasil dibuat.');
}


/**
 * Mengecek apakah account_id adalah akun perpanjangan lisensi.
 */
private function isPerpanjanganAccount($accountId)
{
    return AccountingAccount::where('id', $accountId)
        ->where('account_name', 'LIKE', '%Perpanjangan Sub%')
        ->exists();
}


    public function show(AccountingJournal $journal)
    {
        $journal->load(['details.account', 'creator']);
        return view('journals.show', compact('journal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccountingJournal $journal)
 {
    $user = Auth::user();
    $activeLicenseId = null;

    if ($user->hasRole('Super-Admin')) {
        $licenses = License::all();
    } else {
        $licenses = $user->hasRole('Pemilik Lisensi')
            ? $user->licenses
            : $user->employee?->licenses;

        if (!$licenses || $licenses->isEmpty()) {
            abort(403, 'Lisensi tidak ditemukan.');
        }

        // Cek: jurnal ini milik lisensi user?
        if (!$licenses->pluck('id')->contains($journal->license_id)) {
            abort(403, 'Anda tidak punya akses ke jurnal ini.');
        }

        $activeLicenseId = session('active_license_id');
    } 
    

     // Tentukan daftar license_id untuk query
    $licenseIds = $activeLicenseId
        ? [(string) $activeLicenseId]
        : $licenses->pluck('id')->toArray();

    $accounts = AccountingAccount::where('is_active', true)
        ->when($activeLicenseId, fn($q) => $q->where('license_id', $activeLicenseId))
        ->when(!$user->hasRole('Super-Admin'), fn($q) => $q->whereIn('license_id', $licenseIds))
        ->orderBy('account_code')
        ->get();

    $students = Student::whereIn('license_id', $licenseIds)
        ->select('id', 'fullname')
        ->orderBy('fullname')
        ->get();
    
    $employees = Employee::whereHas('licenses', function ($q) use ($licenseIds) {
            $q->whereIn('employee_license.license_id', $licenseIds);
        })
        ->select('id', 'fullname')
        ->orderBy('fullname')
        ->get();
    $licenseHolders = User::whereHas('licenses', function ($q) use ($licenseIds) {
            $q->whereIn('licenses.id', $licenseIds);
        })
        ->select('id', 'name')
        ->orderBy('name')
        ->get();

    $licenseList = License::where(function ($q) use ($licenseIds, $journal) {
            $q->whereIn('id', $licenseIds)
              ->orWhere('id', $journal->license_id);
        })
        ->select('id', 'name')
        ->get();

    return view('journals.edit', compact('journal', 'activeLicenseId', 'licenses', 'accounts', 'students', 'employees', 'licenseHolders', 'licenseList'));
}


    public function update(UpdateAccountingJournalRequest $request, AccountingJournal $journal)
{
      $user = Auth::user();

    if ($user->hasRole('Super-Admin')) {
        // Boleh ganti license_id
        $journal->license_id = $request->license_id;
    } else {
        $licenses = $user->hasRole('Pemilik Lisensi')
            ? $user->licenses
            : $user->employee?->licenses;

        if (!$licenses || $licenses->isEmpty()) {
            abort(403, 'Lisensi tidak ditemukan.');
        }

        // Harus punya lisensi yang cocok dengan jurnal
        if (!$licenses->pluck('id')->contains($journal->license_id)) {
            abort(403, 'Anda tidak punya akses untuk jurnal ini.');
        }

        // Akuntan tidak boleh ganti license_id, hanya data lain
    }

    $journal->transaction_date = $request->transaction_date;
    $journal->description = $request->description;
    $journal->save();

    // Hapus semua detail lama
    $journal->details()->delete();

    // Buat detail baru
    foreach ($request->details as $detail) {
        $journal->details()->create([
            'account_id' => $detail['account_id'],
            'debit' => $detail['debit'] ?? 0,
            'credit' => $detail['credit'] ?? 0,
            'description' => $detail['description'] ?? null,
        ]);
    }

    return redirect()->route('journals.index')->with('success', 'Jurnal berhasil diperbarui.');

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $journal = AccountingJournal::findOrFail($id);
        $journal->details()->delete();
        $journal->delete();

        return redirect()->route('journals.index')->with('success', 'Jurnal berhasil dihapus.');
    }


    public function report(Request $request)
{
    $user = Auth::user();
    $accountId = $request->input('account_id');
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    $licenseFilterId = $request->input('license_id');

    // Ambil lisensi sesuai role
    $licenses = collect();
    if ($user->hasRole('Super-Admin')) {
        $licenses = License::all();
    } elseif ($user->hasRole('Pemilik Lisensi')) {
        $licenses = $user->licenses ?? collect();
        if ($licenses->isEmpty()) {
            abort(403, 'Lisensi tidak ditemukan.');
        }
    } elseif ($user->hasRole('Akuntan')) {
        $licenses = $user->employee?->licenses ?? collect();
        if ($licenses->isEmpty()) {
            abort(403, 'Lisensi tidak ditemukan.');
        }
    } else {
        abort(403, 'Role tidak diizinkan.');
    }

    // Filter akun
    $accountsQuery = AccountingAccount::where('is_parent', false)->where('is_active', true);
    if ($licenseFilterId) {
        $accountsQuery->where('license_id', $licenseFilterId);
    } else {
        $accountsQuery->whereIn('license_id', $licenses->pluck('id'));
    }
    $accounts = $accountsQuery->orderBy('account_code')->get();

    // Filter jurnal
    $journals = AccountingJournal::with(['details.account', 'creator'])
        ->when($startDate, fn($q) => $q->whereDate('transaction_date', '>=', $startDate))
        ->when($endDate, fn($q) => $q->whereDate('transaction_date', '<=', $endDate))
        ->when($accountId, fn($q) => $q->whereHas('details', fn($q2) => $q2->where('account_id', $accountId)));

    if ($licenseFilterId) {
        if (
            $user->hasRole('Super-Admin') ||
            ($user->hasRole('Pemilik Lisensi') && $licenses->pluck('id')->contains($licenseFilterId)) ||
            ($user->hasRole('Akuntan') && $licenses->pluck('id')->contains($licenseFilterId))
        ) {
            $journals->where('license_id', $licenseFilterId);
        } else {
            abort(403, 'Lisensi tidak valid.');
        }
    } else {
        $journals->whereIn('license_id', $licenses->pluck('id'));
    }

    $journals = $journals->orderBy('transaction_date')->get();

    return view('journals.report', compact(
        'accounts',
        'journals',
        'licenses',
        'licenseFilterId',
        'accountId',
        'startDate',
        'endDate'
    ));
}

}



