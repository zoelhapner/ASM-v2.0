<?php

namespace App\Http\Controllers;

use App\Models\AccountingAccount;
use Illuminate\Http\Request;

class AccountingReportController extends Controller
{
    public function incomeStatement(Request $request)
{
    $startDate = $request->start_date ?? now()->startOfMonth()->toDateString();
    $endDate   = $request->end_date ?? now()->endOfMonth()->toDateString();
    
    if ($user->hasRole('Super-Admin')) {
        $licenses = License::all();
    } else {     
        $licenses = $user->hasRole('Pemilik Lisensi')
            ? $user->licenses
            : $user->employee?->licenses;

        abort_if(!$licenses || $licenses->isEmpty(), 403, 'Lisensi tidak ditemukan.');
    }

    $activeLicenseId = $request->get('license_id') ?? session('active_license_id');

    $accounts = AccountingAccount::with(['details.journal' => function ($q) use ($startDate, $endDate) {
            $q->whereBetween('transaction_date', [$startDate, $endDate]);
        }])
        ->when($licenseId, fn($q) => $q->where('license_id', $licenseId))
        ->whereIn('category', ['Pendapatan', 'Beban'])
        ->get()
        ->map(function ($account) {
            $debit  = $account->details->sum('debit');
            $credit = $account->details->sum('credit');

            $balance = ($account->category === 'Pendapatan')
                ? ($credit - $debit)
                : ($debit - $credit);

            return [
                'code'        => $account->account_code,
                'name'        => $account->account_name,
                'category'    => $account->category,
                'sub_category'=> $account->sub_category,
                'is_parent'   => $account->is_parent,
                'balance'     => $balance,
            ];
        })
        ->reject(fn($acc) => $acc['is_parent']); // skip akun induk

    // 🔹 Grouping by category & sub_category
    $grouped = $accounts->groupBy('category')->map(function ($catGroup) {
        return $catGroup->groupBy('sub_category')->map(function ($subGroup) {
            return [
                'accounts' => $subGroup->sortBy('code')->values(),
                'subtotal' => $subGroup->sum('balance'),
            ];
        });
    });

    $totalIncome  = $grouped['Pendapatan']?->sum('subtotal') ?? 0;
    $totalExpense = $grouped['Beban']?->sum('subtotal') ?? 0;
    $netIncome    = $totalIncome - $totalExpense;

    return view('reports.income_statement', compact(
        'startDate',
        'endDate',
        'activeLicenseId',
        'licenses',
        'grouped',
        'totalIncome',
        'totalExpense',
        'netIncome'
    ));
}


}




    
