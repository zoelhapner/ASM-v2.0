<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index()
    {
            if (request()->ajax()) {
                $roles = Role::withCount('permissions')->get();

                return datatables()->of($roles)
                    ->addColumn('status', fn($row) => '<span class="badge bg-success">Active</span>')
                    ->addColumn('action', function ($row) {
                        return view('roles.partials.actions', compact('row'))->render();
                    })
                    ->rawColumns(['status', 'action'])
                    ->make(true);
            }

            return view('roles.index');
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles,name']);
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);
        return redirect()->route('roles.index')->with('success', 'Role berhasil dibuat.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);
        return redirect()->route('roles.index')->with('success', 'Role diperbarui.');
    }

    public function destroy(Role $role, Request $request)
    {
        try {
        // Kalau perlu, detach dulu user-role
        \DB::table('model_has_roles')->where('role_id', $role->id)->delete();

        $role->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Role berhasil dihapus.'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Terjadi kesalahan saat menghapus.'
        ], 500);
    }

    }
}
