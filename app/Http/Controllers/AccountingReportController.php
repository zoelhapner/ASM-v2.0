<?php

namespace App\Http\Controllers;

use App\Models\AccountingAccount;
use App\Models\License;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
    $startDate = $request->start_date ?? now()->startOfMonth()->toDateString();
    $endDate   = $request->end_date ?? now()->endOfMonth()->toDateString();

    // 🔹 ambil data sama kayak di Excel
    $accounts = \DB::table('accounting_accounts')
        ->select(
            'accounting_accounts.account_code',
            'accounting_accounts.account_name',
            'accounting_accounts.category',
            'accounting_accounts.sub_category',
            \DB::raw("SUM(CASE 
                WHEN accounting_accounts.category = 'Pendapatan' 
                THEN details.credit - details.debit 
                ELSE details.debit - details.credit 
            END) as balance")
        )
        ->leftJoin('accounting_journal_details as details', 'details.account_id', '=', 'accounting_accounts.id')
        ->leftJoin('accounting_journals', 'accounting_journals.id', '=', 'details.journal_id')
        ->whereIn('accounting_accounts.category', ['Pendapatan', 'Beban'])
        ->whereBetween('accounting_journals.transaction_date', [$startDate, $endDate])
        ->groupBy(
            'accounting_accounts.account_code',
            'accounting_accounts.account_name',
            'accounting_accounts.category',
            'accounting_accounts.sub_category'
        )
        ->orderBy('accounting_accounts.account_code', 'asc')
        ->get();

    $pdf = Pdf::loadView('income_statement_pdf', [
        'accounts' => $accounts,
        'startDate' => $startDate,
        'endDate' => $endDate,
    ])->setPaper('a4', 'portrait');

    return $pdf->download("Laporan_Laba_Rugi_{$startDate}_sd_{$endDate}.pdf");
}

    public function exportExcel(Request $request)
{
    $startDate = $request->start_date ?? now()->startOfMonth()->toDateString();
    $endDate   = $request->end_date ?? now()->endOfMonth()->toDateString();

    // 🔹 ambil data (sesuaikan query sama yang di incomeStatement)
    $accounts = DB::table('accounting_accounts')
        ->select(
            'accounting_accounts.account_code',
            'accounting_accounts.account_name',
            'accounting_accounts.category',
            'accounting_accounts.sub_category',
            DB::raw("SUM(CASE 
                WHEN accounting_accounts.category = 'Pendapatan' 
                THEN details.credit - details.debit 
                ELSE details.debit - details.credit 
            END) as balance")
        )
        ->leftJoin('accounting_journal_details as details', 'details.account_id', '=', 'accounting_accounts.id')
        ->leftJoin('accounting_journals', 'accounting_journals.id', '=', 'details.journal_id')
        ->whereIn('accounting_accounts.category', ['Pendapatan', 'Beban'])
        ->whereBetween('accounting_journals.transaction_date', [$startDate, $endDate])
        ->groupBy(
            'accounting_accounts.account_code',
            'accounting_accounts.account_name',
            'accounting_accounts.category',
            'accounting_accounts.sub_category'
        )
        ->orderBy('accounting_accounts.account_code', 'asc')
        ->get();

    // 🔹 Buat Excel
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Judul
    $sheet->setCellValue('A1', 'Laporan Laba Rugi');
    $sheet->setCellValue('A2', "Periode: $startDate s/d $endDate");

    // Header tabel
    $sheet->setCellValue('A4', 'Kode Akun');
    $sheet->setCellValue('B4', 'Nama Akun');
    $sheet->setCellValue('C4', 'Kategori');
    $sheet->setCellValue('D4', 'Sub Kategori');
    $sheet->setCellValue('E4', 'Saldo');

    // Isi data
    $row = 5;
    foreach ($accounts as $acc) {
        $sheet->setCellValue("A$row", $acc->account_code);
        $sheet->setCellValue("B$row", $acc->account_name);
        $sheet->setCellValue("C$row", $acc->category);
        $sheet->setCellValue("D$row", $acc->sub_category);
        $sheet->setCellValue("E$row", $acc->balance);
        $row++;
    }

    // Auto-size kolom
    foreach (range('A', 'E') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // Export
    $fileName = "Laporan_Laba_Rugi_{$startDate}_sd_{$endDate}.xlsx";
    $writer = new Xlsx($spreadsheet);

    return new StreamedResponse(function () use ($writer) {
        $writer->save('php://output');
    }, 200, [
        'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'Content-Disposition' => "attachment;filename=\"$fileName\"",
        'Cache-Control' => 'max-age=0',
    ]);
}

}




    
