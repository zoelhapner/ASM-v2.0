<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ReportService
{
    public static function calculateBalanceSheet(array $groupedAccounts): array
    {
        // 🔹 AKTIVA
        $asetLancar = collect($groupedAccounts['AKTIVA']['Aset Lancar - Kas & Bank']['Aset Lancar - Persediaan Barang']['Aset Lancar - Piutang']['Aset Lancar - Dana Belum Disetor']['Aset Lancar - Pajak Bayar Dimuka'] ?? [])
            ->sum(fn($sub) => $sub['subtotalDebit']);

        $asetTetap = collect($groupedAccounts['AKTIVA']['Aset Tetap'] ?? [])
            ->sum(fn($sub) => $sub['subtotalDebit']);

        $penyusutan = collect($groupedAccounts['AKTIVA']['Penyusutan'] ?? [])
            ->sum(fn($sub) => $sub['subtotalCredit']); // biasanya kredit

        $beban = collect($groupedAccounts['BEBAN'] ?? [])
            ->sum(fn($sub) => $sub['subtotalDebit']);

        $totalAktiva = $asetLancar + ($asetTetap - $penyusutan) + $beban;


        // 🔹 PASSIVA
        $kewajiban = collect($groupedAccounts['KEWAJIBAN'] ?? [])
            ->sum(fn($sub) => $sub['subtotalCredit']);

        $ekuitas = collect($groupedAccounts['EKUITAS'] ?? [])
            ->sum(fn($sub) => $sub['subtotalCredit']);

        $pendapatan = collect($groupedAccounts['PENDAPATAN'] ?? [])
            ->sum(fn($sub) => $sub['subtotalDebit']['subtotalCredit']);

        $totalPassiva = $kewajiban + $ekuitas + $pendapatan;


        return [
            'asetLancar'         => $asetLancar,
            'asetTetap'          => $asetTetap,
            'penyusutan'         => $penyusutan,
            'beban'              => $beban,
            'totalAktiva'        => $totalAktiva,

            'kewajiban'     => $kewajiban,
            'ekuitas'       => $ekuitas,
            'pendapatan'    => $pendapatan,
            'totalPassiva'  => $totalPassiva,
        ];
    }
}
