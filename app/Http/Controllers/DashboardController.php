<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\Employee;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('Super-Admin')) {
            // Admin: tampilkan semua
            $licensesCount = License::count();
            $employeesCount = Employee::count();
            $studentsCount = Student::count();
            $monthlyRevenue = 'Rp 1.2M';
        } elseif ($user->hasRole('Pemilik Lisensi')) {
            // Pemilik Lisensi: filter sesuai lisensi
            $licenses = $user->licenses; // relasi licenses di model User
            $licensesCount = $licenses->count();
            
            // Karyawan sesuai lisensi yg dimiliki
            $employeesCount = Employee::whereHas('licenses', function ($q) use ($licenses) {
                $q->whereIn('licenses.id', $licenses->pluck('id'));
            })->count();

            // Siswa sesuai lisensi yg dimiliki
            $studentsCount = Student::whereIn('license_id', $licenses->pluck('id'))->count();
            $monthlyRevenue = 'Rp 500juta';
        } else {
            // Role lain, bisa redirect atau beri akses terbatas
            abort(403, 'Unauthorized');
        }

        
    // Dummy branches — bisa role-based juga kalau mau
    $branches = [
        (object)[
            'name' => 'AHA Jember 1',
            'owner_name' => 'Budi Santoso',
            'students' => 456,
            'revenue' => '1,3M',
            'status' => '90% Lulus'
        ],
        (object)[
            'name' => 'AHA Jember 2',
            'owner_name' => 'Siti Nurhaliza',
            'students' => 389,
            'revenue' => '800jt',
            'status' => '50% Lulus'
        ],
        (object)[
            'name' => 'AHA Lumajang',
            'owner_name' => 'Ahmad Wijaya',
            'students' => 334,
            'revenue' => '500jt',
            'status' => '20% Lulus'
        ]
    ];

        return view('dashboard.index', compact(
            'licensesCount',
            'employeesCount',
            'studentsCount',
             'monthlyRevenue',
        'branches'
        ));
    }
}
