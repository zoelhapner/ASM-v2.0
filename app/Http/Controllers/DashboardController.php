<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\Employee;
use App\Models\Student;
use App\Models\LicenseNotification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\AccountingJournalDetail;

class DashboardController extends Controller
{
    public function index()
{
    $user = auth()->user()->load([
        'licenses',
        'licenseholder',
        'employee.licenses',
    ]);

    $licenseName = 'AHA Right Brain';

    if (
        $user->licenseholder &&
        $user->licenses instanceof \Illuminate\Support\Collection &&
        $user->licenses->isNotEmpty()
    ) {
        $licenseName = $user->licenses->first()['name'] ?? $licenseName;
    } elseif (
        $user->employee &&
        $user->employee->licenses instanceof \Illuminate\Support\Collection &&
        $user->employee->licenses->isNotEmpty()
    ) {
        $licenseName = $user->getActiveLicenseName();
    }

    $awalBulan = now()->startOfMonth();
    $akhirBulan = now()->endOfMonth();

    if ($user->hasRole('Super-Admin')) {
        $licensesCount = License::count();
        $employeesCount = Employee::count();
        $studentsCount = Student::count();

        $monthlyRevenue = AccountingJournalDetail::whereHas('account', function($q) {
                $q->where('account_code', 'like', '4%');
            })
            ->whereHas('journal', function($q) use ($awalBulan, $akhirBulan) {
                $q->whereBetween('transaction_date', [$awalBulan, $akhirBulan]);
            })
            ->sum('credit');

    } elseif ($user->hasRole('Pemilik Lisensi')) {
        $licenses = $user->licenses;
        $licensesCount = $licenses->count();

        $employeesCount = Employee::whereHas('licenses', function ($q) use ($licenses) {
                $q->whereIn('licenses.id', $licenses->pluck('id'));
            })->count();

        $studentsCount = Student::whereIn('license_id', $licenses->pluck('id'))->count();

        $monthlyRevenue = AccountingJournalDetail::whereHas('account', function($q) {
                $q->where('account_code', 'like', '4%');
            })
            ->whereHas('journal', function($q) use ($awalBulan, $akhirBulan, $licenses) {
                $q->whereIn('license_id', $licenses->pluck('id'))
                  ->whereBetween('transaction_date', [$awalBulan, $akhirBulan]);
            })
            ->sum('credit');

    } else {
        $licensesCount = 0;
        $employeesCount = 0;
        $studentsCount = 0;
        $monthlyRevenue = 'Rp 0';
    }

    // Lisensi yang akan digunakan untuk filter ranking
    if ($user->hasRole('Super-Admin')) {
        $licenses = License::all();
    } elseif ($user->hasRole('Pemilik Lisensi')) {
        $licenses = $user->licenses;
    } else {
        $licenses = collect();
    }

    // Lisensi dengan siswa terbanyak bulan ini
    $topLicenseByStudents = Student::selectRaw('license_id, COUNT(*) as total_students')
        ->whereBetween('registered_date', [$awalBulan, $akhirBulan])
        ->when($licenses->isNotEmpty(), function ($q) use ($licenses) {
            $q->whereIn('license_id', $licenses->pluck('id'));
        })
        ->groupBy('license_id')
        ->orderByDesc('total_students')
        ->take(3)
        ->get()
        ->map(function ($item) {
            $license = License::with('owners')->find($item->license_id);
            return (object) [
                'name' => $license?->name ?? '-',
                'owner_name' => $license?->owners?->pluck('name')->join(', ') ?? '-',
                'students' => $item->total_students,
            ];
        });

    // Lisensi dengan pendapatan terbanyak bulan ini
    $topLicenseByRevenue = AccountingJournalDetail::selectRaw('accounting_journals.license_id, SUM(debit) as total_revenue')
        ->join('accounting_journals', 'accounting_journals.id', '=', 'accounting_journal_details.journal_id')
        ->join('accounting_accounts', 'accounting_accounts.id', '=', 'accounting_journal_details.account_id')
        ->where('accounting_accounts.account_code', 'like', '4%')
        ->whereBetween('accounting_journals.transaction_date', [$awalBulan, $akhirBulan])
        ->when($user->hasRole('Pemilik Lisensi'), function ($q) use ($licenses) {
            $q->whereIn('accounting_journals.license_id', $licenses->pluck('id'));
        })
        ->groupBy('accounting_journals.license_id')
        ->orderByDesc('total_revenue')
        ->take(3)
        ->get()
        ->map(function ($item) {
            $license = License::with('owners')->find($item->license_id);
            return (object) [
                'name' => $license?->name ?? '-',
                 'owner_name' => $item->license?->owners?->pluck('name')->join(', ') ?? '-',
                'revenue' => $item->total_revenue,
            ];
        });

    // === Filter notifikasi sesuai role & lisensi aktif ===
    $activeLicenseId = session('active_license_id');

    $notificationsQuery = LicenseNotification::where('read', false)
        ->latest()
        ->take(5);

    if ($user->hasRole('Super-Admin')) {
        $notifications = $notificationsQuery->get();
    } elseif ($user->hasRole('Pemilik Lisensi')) {
        $notifications = $notificationsQuery
            ->whereIn('license_id', $user->licenses->pluck('id'))
            ->get();
    } else {
        $notifications = $notificationsQuery
            ->where('license_id', $activeLicenseId)
            ->get();
    }

    return view('dashboard.index', compact(
        'licenses',
        'licensesCount',
        'employeesCount',
        'studentsCount',
        'monthlyRevenue',
        'licenseName',
        'notifications',
        'topLicenseByStudents',
        'topLicenseByRevenue'
    ));
}

}

// public function index()
    // {
    //     $user = auth()->user()->load([
    //         'licenses',
    //         'licenseholder',
    //         'employee.licenses',
    //     ]);

    //     $licenseName = 'AHA Right Brain';

    //     if (
    //         $user->licenseholder &&
    //         $user->licenses instanceof \Illuminate\Support\Collection &&
    //         $user->licenses->isNotEmpty()
    //     ) {
    //         $licenseName = $user->licenses->first()['name'] ?? $licenseName;

    //     //  Jika user karyawan, ambil dari relasi employee → licenses
    //     } elseif (
    //         $user->employee &&
    //         $user->employee->licenses instanceof \Illuminate\Support\Collection &&
    //         $user->employee->licenses->isNotEmpty()
    //     ) {
    //         $licenseName = $user->getActiveLicenseName();
    //     }

    //     $awalBulan = now()->startOfMonth();
    //     $akhirBulan = now()->endOfMonth();

    //     if ($user->hasRole('Super-Admin')) {
    //         // Admin: tampilkan semua
    //         $licensesCount = License::count();
    //         $employeesCount = Employee::count();
    //         $studentsCount = Student::count();
            
    //         $monthlyRevenue = AccountingJournalDetail::whereHas('account', function($q) {
    //             $q->where('account_code', 'like', 'D%');
    //         })
    //         ->whereHas('journal', function($q) use ($awalBulan, $akhirBulan) {
    //             $q->whereBetween('transaction_date', [$awalBulan, $akhirBulan]);
    //         })
    //         ->sum('debit');

    //     } elseif ($user->hasRole('Pemilik Lisensi')) {
    //         // Pemilik Lisensi: filter sesuai lisensi
    //         $licenses = $user->licenses; // relasi licenses di model User
    //         $licensesCount = $licenses->count();
            
    //         // Karyawan sesuai lisensi yg dimiliki
    //         $employeesCount = Employee::whereHas('licenses', function ($q) use ($licenses) {
    //             $q->whereIn('licenses.id', $licenses->pluck('id'));
    //         })->count();

    //         // Siswa sesuai lisensi yg dimiliki
    //         $studentsCount = Student::whereIn('license_id', $licenses->pluck('id'))->count();
    //         $monthlyRevenue = AccountingJournalDetail::whereHas('account', function($q) {
    //             $q->where('account_code', 'like', 'D%');
    //         })
    //         ->whereHas('journal', function($q) use ($awalBulan, $akhirBulan, $licenses) {
    //             $q->whereIn('license_id', $licenses->pluck('id'))
    //               ->whereBetween('transaction_date', [$awalBulan, $akhirBulan]);
    //         })
    //         ->sum('debit');
    //     } else {
    //         // Role lain, bisa redirect atau beri akses terbatas
    //         $licensesCount = 0;
    //         $employeesCount = 0;
    //         $studentsCount = 0;
    //         $monthlyRevenue = 'Rp 0';
    //     }

    //     $user = auth()->user();

    //     if ($user->hasRole('Super-Admin')) {
    //         $licenses = License::all();
    //     } elseif ($user->hasRole('Pemilik Lisensi')) {
    //         $licenses = $user->licenses;
    //     } else {
    //         $licenses = collect(); // kosongkan kalau role lain
    //     }

    //     // Lisensi dengan siswa terbanyak bulan ini
    //     $topLicenseByStudents = Student::selectRaw('license_id, COUNT(*) as total_students')
    //         ->whereBetween('registered_date', [$awalBulan, $akhirBulan])
    //         ->when($licenses->isNotEmpty(), function ($q) use ($licenses) {
    //             $q->whereIn('license_id', $licenses->pluck('id'));
    //         })
    //         ->groupBy('license_id')
    //         ->orderByDesc('total_students')
    //         ->take(3)
    //         ->get();

    //     $topLicenseByStudents = $topLicenseByStudents->map(function ($item) {
    //          $license = License::with('owners')->where('id', $item->license_id)->first();
    //         return (object) [
    //             'name' => $license?->name ?? '-',
    //             'owner_name' => $license?->users?->name ?? '-',
    //             'students' => $item->total_students,
    //         ];
    //     });

    //     // Lisensi dengan pendapatan terbanyak bulan ini
    //     $topLicenseByRevenue = AccountingJournalDetail::selectRaw('accounting_journals.license_id, SUM(debit) as total_revenue')
    //         ->join('accounting_journals', 'accounting_journals.id', '=', 'accounting_journal_details.journal_id')
    //         ->join('accounting_accounts', 'accounting_accounts.id', '=', 'accounting_journal_details.account_id')
    //         ->where('accounting_accounts.account_code', 'like', 'D%')
    //         ->whereBetween('accounting_journals.transaction_date', [$awalBulan, $akhirBulan])
    //         ->when($user->hasRole('Pemilik Lisensi'), function ($q) use ($licenses) {
    //             $q->whereIn('accounting_journals.license_id', $licenses->pluck('id'));
    //         })
    //         ->groupBy('accounting_journals.license_id')
    //         ->orderByDesc('total_revenue')
    //         ->take(3)
    //         ->get();

    //         // Map data pendapatan
    //         $topLicenseByRevenue = $topLicenseByRevenue->map(function ($item) {
    //             $license = License::with('owners')->where('id', $item->license_id)->first();
    //             return (object) [
    //                 'name' => $license?->name ?? '-',
    //                 'owner_name' => $license?->users?->name ?? '-',
    //                 'revenue' => $item->total_revenue,
    //             ];
    //         });


    //     $notifications = LicenseNotification::where('read', false)
    //         ->latest()
    //         ->take(5)
    //         ->get();

    //         return view('dashboard.index', compact(
    //             'licenses',
    //             'licensesCount',
    //             'employeesCount',
    //             'studentsCount',
    //             'monthlyRevenue',
    //             'licenseName',
    //             'notifications',
    //             'topLicenseByStudents',
    //             'topLicenseByRevenue'
    //         ));
  
    // }
