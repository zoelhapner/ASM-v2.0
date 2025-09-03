<?php

namespace App\Http\Controllers;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;    
use App\Models\AccountingJournal;
    

class JournalExportController extends Controller
{  
    public function export(AccountingJournal $journal)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Judul
        $sheet->setCellValue('A1', 'Jurnal Transaksi');
        $sheet->mergeCells('A1:F1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);

        // Info transaksi
        $sheet->setCellValue('A3', 'No. Transaksi');
        $sheet->setCellValue('B3', $journal->journal_code);

        $sheet->setCellValue('A4', 'Tanggal Transaksi');
        $sheet->setCellValue('B4', \Carbon\Carbon::parse($journal->transaction_date)->format('d/m/Y'));

        $sheet->setCellValue('A5', 'Lisensi');
        $sheet->setCellValue('B5', $journal->license->name ?? '-');

        // Header tabel
        $sheet->setCellValue('A7', 'No. Akun');
        $sheet->setCellValue('B7', 'Nama Akun');
        $sheet->setCellValue('C7', 'Deskripsi');
        $sheet->setCellValue('D7', 'User');
        $sheet->setCellValue('E7', 'Debit');
        $sheet->setCellValue('F7', 'Kredit');

        $row = 8;
        $totalDebit = 0;
        $totalCredit = 0;

        foreach ($journal->details as $detail) {
            $sheet->setCellValue("A{$row}", $detail->account->account_code ?? '-');
            $sheet->setCellValue("B{$row}", $detail->account->account_name ?? '-');
            $sheet->setCellValue("C{$row}", $detail->description ?? '-');
            $sheet->setCellValue("D{$row}", $detail->person_name ?? '-');
            $sheet->setCellValue("E{$row}", $detail->debit);
            $sheet->setCellValue("F{$row}", $detail->credit);

            $totalDebit += $detail->debit;
            $totalCredit += $detail->credit;
            $row++;
        }

        // Total
        $sheet->setCellValue("D{$row}", 'TOTAL');
        $sheet->setCellValue("E{$row}", $totalDebit);
        $sheet->setCellValue("F{$row}", $totalCredit);
        $sheet->getStyle("D{$row}:F{$row}")->getFont()->setBold(true);

        // Styling (opsional)
        $sheet->getStyle("A7:F7")->getFont()->setBold(true);
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);

        // Download response
        $writer = new Xlsx($spreadsheet);
        $fileName = 'journal-'.$journal->journal_code.'.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }

    public function exportGeneral(AccountingJournal $journal)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Judul
        $sheet->setCellValue('A1', 'Jurnal Umum');
        $sheet->mergeCells('A1:G1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);

        // Info transaksi
        $sheet->setCellValue('A3', 'Dari');
        $sheet->setCellValue('B4', \Carbon\Carbon::parse($journal->transaction_date)->format('d/m/Y'));

        $sheet->setCellValue('A4', 'Sampai');
        $sheet->setCellValue('B4', \Carbon\Carbon::parse($journal->transaction_date)->format('d/m/Y'));

        $sheet->setCellValue('A5', 'Lisensi');
        $sheet->setCellValue('B5', $journal->license->name ?? '-');

        // Header tabel
        $sheet->setCellValue('A7', 'Tanggal');
        $sheet->setCellValue('B7', 'No Jurnal');
        $sheet->setCellValue('C7', 'Deskripsi');
        $sheet->setCellValue('D7', 'No. Akun');
        $sheet->setCellValue('E7', 'Nama Akun');
        $sheet->setCellValue('F7', 'Debit');
        $sheet->setCellValue('G7', 'Kredit');

        $row = 8;
        $totalDebit = 0;
        $totalCredit = 0;

        foreach ($journal->details as $detail) {
            $sheet->setCellValue("A{$row}", $detail->journal->transaction_date ?? '-');
            $sheet->setCellValue("B{$row}", $detail->journal->journal_code ?? '-');
            $sheet->setCellValue("C{$row}", $detail->description ?? '-');
            $sheet->setCellValue("D{$row}", $detail->account->account_code ?? '-');
            $sheet->setCellValue("E{$row}", $detail->account->account_name ?? '-');
            $sheet->setCellValue("F{$row}", $detail->debit);
            $sheet->setCellValue("G{$row}", $detail->credit);

            $totalDebit += $detail->debit;
            $totalCredit += $detail->credit;
            $row++;
        }

        // Total
        $sheet->setCellValue("D{$row}", 'TOTAL');
        $sheet->setCellValue("F{$row}", $totalDebit);
        $sheet->setCellValue("G{$row}", $totalCredit);
        $sheet->getStyle("D{$row}:G{$row}")->getFont()->setBold(true);

        // Styling (opsional)
        $sheet->getStyle("A7:G7")->getFont()->setBold(true);
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);

        // Download response
        $writer = new Xlsx($spreadsheet);
        $fileName = 'journal-'.$journal->journal_code.'.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }

}