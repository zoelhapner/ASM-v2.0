<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\License;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
       // Misal kamu sudah punya User Akuntan & License
    $akuntan = User::where('email', 'akuntan@example.com')->first();
    $license = License::first(); // Ambil license pertama, atau ganti sesuai kebutuhan

    if ($akuntan && $license) {
        \DB::table('license_holders')->updateOrInsert([
            'user_id' => $akuntan->id,
            'id' => $license->id,
        ], [
            'id' => Str::uuid(),
        ]);

        echo " License holder Akuntan berhasil di-link ke license!\n";
    } else {
        echo "  User Akuntan atau License belum ada.\n";
    }
}

}
