<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Models\Province as IndoProvince;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        foreach (IndoProvince::all() as $prov) {
            Province::create([
                'name' => $prov->name,
                'country_id' => 1, // Ganti kalau ada relasi country yang berbeda
                'is_active' => true,
            ]);
        }
    }
}
