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
        $licenseId = $request->license_id ?? null;

        $accounts = AccountingAccount::with(['details.journal' => function ($q) use ($startDate, $endDate) {
            $q->whereBetween('transaction_date', [$startDate, $endDate]);
        }])
        ->when($licenseId, fn($q) => $q->where('license_id', $licenseId))
        ->get();

        $incomeAccounts = [];
        $expenseAccounts = [];
        $totalIncome = 0;
        $totalExpense = 0;

        foreach ($accounts as $account) {
            $debit = $account->details->sum('debit');
            $credit = $account->details->sum('credit');

            // hitung saldo (untuk Pendapatan saldo normal di kredit, untuk expense di debit)
            $balance = ($account->category === 'Pendapatan')
                ? ($credit - $debit)
                : ($debit - $credit);

            if ($account->category === 'Pendapatan') {
                $incomeAccounts[] = [
                    'code' => $account->account_code,
                    'name' => $account->account_name,
                    'balance' => $balance,
                ];
                $totalIncome += $balance;
            }

            if ($account->category === 'Beban') {
                $expenseAccounts[] = [
                    'code' => $account->account_code,
                    'name' => $account->account_name,
                    'balance' => $balance,
                ];
                $totalExpense += $balance;
            }
        }

        $netIncome = $totalIncome - $totalExpense;

        return view('reports.income_statement', compact(
            'startDate',
            'endDate',
            'incomeAccounts',
            'expenseAccounts',
            'totalIncome',
            'totalExpense',
            'netIncome'
        ));
    }

}




    
