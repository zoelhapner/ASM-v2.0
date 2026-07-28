<?php

namespace Database\Seeders;

use App\Models\License;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountingPeriodSeeder extends Seeder
{
    public function run(): void
    {
        $licenseId = License::first()->id ?? Str::uuid();

        $startYear = 2025; // bebas
        $endYear   = date('Y') + 10; // auto sampai 5 tahun ke depan

            for ($year = $startYear; $year <= $endYear; $year++) {

                DB::table('accounting_periods')->updateOrInsert(
                    [
                        'license_id' => $licenseId,
                        'year' => $year,
                    ],
                    [
                        'id'         => Str::uuid(),
                        'start_date' => "$year-01-01",
                        'end_date'   => "$year-12-31",
                        'is_closed'  => false,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
    }
}