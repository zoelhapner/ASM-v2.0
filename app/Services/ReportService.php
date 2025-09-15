<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ReportService
{
    private static function getVal($sub, string $key): float
    {
        if (is_array($sub)) {
            return $sub[$key] ?? 0;
        }
        if (is_object($sub)) {
            return $sub->$key ?? 0;
        }
        return 0;
    }

    public static function calculateBalanceSheet(Collection|array $groupedAccounts): array
    {
         if ($groupedAccounts instanceof Collection) {
            $groupedAccounts = $groupedAccounts->toArray();
        }
        // 🔹 AKTIVA
        $asetLancar = collect($groupedAccounts['AKTIVA']['Aset Lancar - Kas & Bank']['Aset Lancar - Persediaan Barang']['Aset Lancar - Piutang']['Aset Lancar - Dana Belum Disetor']['Aset Lancar - Pajak Bayar Dimuka'] ?? [])
            ->sum(fn($sub) => self::getVal($sub, 'subtotalDebit'));

        $asetTetap = collect($groupedAccounts['AKTIVA']['Aset Tetap'] ?? [])
    
            ->sum(fn($sub) => self::getVal($sub, 'subtotalDebit'));

        $penyusutan = collect($groupedAccounts['AKTIVA']['Penyusutan'] ?? [])
            
            ->sum(fn($sub) => self::getVal($sub, 'subtotalCredit'));

        $beban = collect($groupedAccounts['BEBAN'] ?? [])
            
            ->sum(fn($sub) => self::getVal($sub, 'subtotalDebit'));

        $totalAktiva = $asetLancar + ($asetTetap - $penyusutan) + $beban;


        // 🔹 PASSIVA
        $kewajiban = collect($groupedAccounts['KEWAJIBAN'] ?? [])
            
            ->sum(fn($sub) => self::getVal($sub, 'subtotalCredit'));

        $ekuitas = collect($groupedAccounts['EKUITAS'] ?? [])
        
            ->sum(fn($sub) => self::getVal($sub, 'subtotalDebit', 'subtotalCredit'));

        $pendapatan = collect($groupedAccounts['PENDAPATAN'] ?? [])
            
            ->sum(fn($sub) => self::getVal($sub, 'subtotalCredit'));

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
