<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Clear cached permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Daftar permission
        $permissions = [
            'lisensi.tambah',
            'lisensi.lihat',
            'lisensi.ubah',
            'lisensi.hapus',

            'pemilik-lisensi.tambah',
            'pemilik-lisensi.lihat',
            'pemilik-lisensi.ubah',
            'pemilik-lisensi.hapus',

            'keluarga-pemilik.tambah',
            'keluarga-pemilik.lihat',
            'keluarga-pemilik.ubah',
            'keluarga-pemilik.hapus',

            'pendidikan-pemilik.tambah',
            'pendidikan-pemilik.lihat',
            'pendidikan-pemilik.ubah',
            'pendidikan-pemilik.hapus',

            'pekerjaan-pemilik.tambah',
            'pekerjaan-pemilik.lihat',
            'pekerjaan-pemilik.ubah',
            'pekerjaan-pemilik.hapus',
        ];

        // Buat permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat role
        $roles = [
            'Super-Admin',
            'Pemilik Lisensi',
            'HRD',
            'Akuntan',
            'Karyawan',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Assign permissions ke masing-masing role

        // Super-Admin → semua permission (gunakan Gate::before di AuthServiceProvider)
        $superAdmin = Role::where('name', 'Super-Admin')->first();
        $superAdmin->syncPermissions(Permission::all());

        // Pemilik Lisensi
        Role::where('name', 'Pemilik Lisensi')->first()->syncPermissions([
            'lisensi.ubah',
            'pemilik-lisensi.ubah',
            'keluarga-pemilik.tambah',
            'keluarga-pemilik.lihat',
            'keluarga-pemilik.ubah',
            'keluarga-pemilik.hapus',
            'pendidikan-pemilik.tambah',
            'pendidikan-pemilik.lihat',
            'pendidikan-pemilik.ubah',
            'pendidikan-pemilik.hapus',
            'pekerjaan-pemilik.tambah',
            'pekerjaan-pemilik.lihat',
            'pekerjaan-pemilik.ubah',
            'pekerjaan-pemilik.hapus',
        ]);

        // HRD
        Role::where('name', 'HRD')->first()->syncPermissions([]);

        // Akuntan
        Role::where('name', 'Akuntan')->first()->syncPermissions([]);

        // Karyawan
        Role::where('name', 'Karyawan')->first()->syncPermissions([]);

        // Buat contoh user dan assign role-nya
        \App\Models\User::factory()->create([
            'name' => 'User Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Super-Admin');

        \App\Models\User::factory()->create([
            'name' => 'User Pemilik Lisensi',
            'email' => 'pemilik@example.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Pemilik Lisensi');

        \App\Models\User::factory()->create([
            'name' => 'User HRD',
            'email' => 'hrd@example.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('HRD');

        \App\Models\User::factory()->create([
            'name' => 'User Akuntan',
            'email' => 'akuntan@example.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Akuntan');

        \App\Models\User::factory()->create([
            'name' => 'User Karyawan',
            'email' => 'karyawan@example.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Karyawan');
    }
}
