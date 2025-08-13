<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Str;

class AddNewPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'jurnal.tambah',
            'jurnal.lihat',
            'jurnal.ubah',
            'jurnal.hapus',

            'keluarga-karyawan.tambah',
            'keluarga-karyawan.lihat',
            'keluarga-karyawan.ubah',
            'keluarga-karyawan.hapus',

            'pendidikan-karyawan.tambah',
            'pendidikan-karyawan.lihat',
            'pendidikan-karyawan.ubah',
            'pendidikan-karyawan.hapus',

            'pekerjaan-karyawan.tambah',
            'pekerjaan-karyawan.lihat',
            'pekerjaan-karyawan.ubah',
            'pekerjaan-karyawan.hapus',

        ];

        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate(
                ['name' => $permissionName, 'guard_name' => 'web'],
                ['id' => (string) Str::uuid()]
            );

            if (!$permission->id || strlen($permission->id) < 36) {
                $permission->id = Str::uuid();
                $permission->save();
            }
        }
    }
}
