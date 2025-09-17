<?php

namespace App\Http\Controllers;

use App\Models\AccountingAccount;
use App\Models\License;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountingReportController extends Controller
{
    public function incomeStatement(Request $request)
{
    $user = Auth::user();
    
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

    $accounts = AccountingAccount::select(
                'accounting_accounts.id',
                'accounting_accounts.account_code',
                'accounting_accounts.account_name',
                'accounting_accounts.category',
                'accounting_accounts.sub_category',
                'accounting_accounts.is_parent',
                DB::raw("SUM(CASE WHEN accounting_accounts.category = 'Pendapatan' THEN details.credit - details.debit ELSE details.debit - details.credit END) as balance")
            )
            ->leftJoin('accounting_journal_details as details', 'details.account_id', '=', 'accounting_accounts.id')
            ->leftJoin('accounting_journals', 'accounting_journals.id', '=', 'details.journal_id')
            ->when($activeLicenseId, fn($q) => $q->where('accounting_accounts.license_id', $activeLicenseId))
            ->whereIn('accounting_accounts.category', ['Pendapatan', 'Beban'])
            ->whereBetween('accounting_journals.transaction_date', [$startDate, $endDate])
            ->groupBy(
                'accounting_accounts.id',
                'accounting_accounts.account_code',
                'accounting_accounts.account_name',
                'accounting_accounts.category',
                'accounting_accounts.sub_category',
                'accounting_accounts.is_parent'
            )
            ->orderBy('accounting_accounts.account_code')
            ->get()
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

public function exportPdf(Request $request)
    {
        [$startDate, $endDate, $activeLicenseId, $licenses, $grouped, $totalIncome, $totalExpense, $netIncome] = 
            $this->getReportData($request);

        $pdf = PDF::loadView('reports.income_statement_pdf', compact(
            'startDate','endDate','activeLicenseId','licenses',
            'grouped','totalIncome','totalExpense','netIncome'
        ));

        return $pdf->download("income_statement_{$startDate}_to_{$endDate}.pdf");
    }

private function getReportData($request)
    {
        $from = $request->from ?? date('Y-m-01');
        $to = $request->to ?? date('Y-m-t');

        return DB::table('accounting_accounts')
            ->select(
                'accounting_accounts.id',
                'accounting_accounts.account_code',
                'accounting_accounts.account_name',
                'accounting_accounts.category',
                'accounting_accounts.sub_category',
                'accounting_accounts.is_parent',
                DB::raw("SUM(CASE 
                    WHEN accounting_accounts.category = 'Pendapatan' 
                    THEN details.credit - details.debit 
                    ELSE details.debit - details.credit 
                END) as balance")
            )
            ->leftJoin('accounting_journal_details as details', 'details.account_id', '=', 'accounting_accounts.id')
            ->leftJoin('accounting_journals', 'accounting_journals.id', '=', 'details.journal_id')
            ->whereIn('accounting_accounts.category', ['Pendapatan', 'Beban'])
            ->whereBetween('accounting_journals.transaction_date', [$from, $to])
            ->groupBy(
                'accounting_accounts.id',
                'accounting_accounts.account_code',
                'accounting_accounts.account_name',
                'accounting_accounts.category',
                'accounting_accounts.sub_category',
                'accounting_accounts.is_parent'
            )
            ->orderBy('accounting_accounts.account_code', 'asc')
            ->get();
    }

}




    
