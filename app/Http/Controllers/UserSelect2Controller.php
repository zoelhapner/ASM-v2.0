<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Employee;
use App\Models\License;

class UserSelect2Controller extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:student,employee,license',
        ]);

        $model = null;

        switch ($request->type) {
            case 'student':
                $model = Student::create([
                    'name' => $request->name,
                    // tambahkan kolom lain default (misal email/null)
                ]);
                break;

            case 'employee':
                $model = Employee::create([
                    'name' => $request->name,
                    // tambahkan kolom default lain
                ]);
                break;

            case 'license':
                $model = License::create([
                    'name' => $request->name,
                    // tambahkan kolom default lain
                ]);
                break;
        }

        return response()->json([
            'id' => $model->id,
            'name' => $model->name,
        ]);
    }
}
