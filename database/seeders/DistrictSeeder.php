<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Models\District as IndoDistrict;
use App\Models\District;
use App\Models\City;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        foreach (IndoDistrict::with('city')->get() as $district) {
            $localCity = City::where('name', $district->city->name)->first();

            if ($localCity) {
                District::create([
                    'name' => $district->name,
                    'city_id' => $localCity->id,
                    'is_active' => true,
                ]);
            }
        }
    }
}

