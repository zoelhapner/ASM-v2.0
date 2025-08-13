<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KasController extends Controller
{
   public function exportExcel(Request $request)
    {
        // $journals = $this->getFilteredJournals($request); 
        // // Buat fungsi getFilteredJournals() yang isinya query yang sama persis seperti report.blade.php
        $journals = \App\Models\AccountingJournal::with(['details.account', 'creator'])
        ->when($request->license_id, function ($q) use ($request) {
            $q->where('license_id', $request->license_id);
        })
        ->when($request->account_id, function ($q) use ($request) {
            $q->whereHas('details', function ($q2) use ($request) {
                $q2->where('account_id', $request->account_id);
            });
        })
        ->when($request->start_date && $request->end_date, function ($q) use ($request) {
            $q->whereBetween('transaction_date', [$request->start_date, $request->end_date]);
        })
        ->orderBy('transaction_date', 'asc')
        ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $headers = [
            'NO', 'TANGGAL', 'RINCIAN', 'KODE AKUN', 'AKUN',
            'USER', 'PIC', 'DEBIT (pemasukan)', 'KREDIT (pengeluaran)',
            'SALDO', 'KETERANGAN'
        ];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data
        $no = 1;
        $row = 2;
        $saldo = 0;
        $totalDebit = 0;
        $totalKredit = 0;

        foreach ($journals as $journal) {
            foreach ($journal->details as $detail) {
                $debit = $detail->debit;
                $kredit = $detail->credit;
                $saldo += $debit - $kredit;
                $totalDebit += $debit;
                $totalKredit += $kredit;

                $sheet->setCellValue('A' . $row, $no++);
                $sheet->setCellValue('B' . $row, Carbon::parse($journal->transaction_date)->format('d/m/Y'));
                $sheet->setCellValue('C' . $row, $journal->description);
                $sheet->setCellValue('D' . $row, $detail->account->account_code);
                $sheet->setCellValue('E' . $row, $detail->account->account_name);
                $sheet->setCellValue('F' . $row, $detail->person_name);
                $sheet->setCellValue('G' . $row, $journal->creator->name ?? '-');
                $sheet->setCellValue('H' . $row, $debit);
                $sheet->setCellValue('I' . $row, $kredit);
                $sheet->setCellValue('J' . $row, $saldo);
                $sheet->setCellValue('K' . $row, $detail->description ?? '-');

                $row++;
            }
        }

        // Baris total
        $sheet->setCellValue('A' . $row, 'TOTAL');
        $sheet->mergeCells("A{$row}:G{$row}");
        $sheet->setCellValue('H' . $row, $totalDebit);
        $sheet->setCellValue('I' . $row, $totalKredit);
        $sheet->setCellValue('J' . $row, $saldo);

        // Output Excel
        $fileName = 'laporan_kas_' . date('Y-m-d_H-i-s') . '.xlsx';
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        $writer->save('php://output');
        exit;
    }
    
}
