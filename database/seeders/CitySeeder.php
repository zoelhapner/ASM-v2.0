<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Models\City as IndoCity;
use App\Models\City;
use App\Models\Province;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        foreach (IndoCity::with('province')->get() as $city) {
            $localProvince = Province::where('name', $city->province->name)->first();

            if ($localProvince) {
                City::create([
                    'name' => $city->name,
                    'province_id' => $localProvince->id,
                    'is_active' => true,
                ]);
            }
        }
    }
}

