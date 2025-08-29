<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{AccountingAccount, Student, Employee, LicenseHolder, License};

class AccountingApiController extends Controller
{
    /** tentukan lisensi yang boleh diakses user */
    private function resolveLicenseIds(?string $explicitLicenseId = null): array
    {
        $user = Auth::user();

        // jika super admin & ada explicit id => pakai itu
        if ($user->hasRole('Super-Admin')) {
            if ($explicitLicenseId) return [$explicitLicenseId];
            return License::pluck('id')->all();
        }

        // user non-super
        $owned = $user->hasRole('Pemilik Lisensi')
            ? $user->licenses()->pluck('licenses.id')->all()
            : optional($user->employee)->licenses()->pluck('licenses.id')->all();

        if (!$owned || empty($owned)) {
            abort(403, 'License tidak ditemukan untuk user ini.');
        }

        if ($explicitLicenseId) {
            if (!in_array($explicitLicenseId, $owned, true)) {
                abort(403, 'Anda tidak memiliki akses ke lisensi ini.');
            }
            return [$explicitLicenseId];
        }

        // coba session active, lalu fallback ke semua yang dimiliki
        $active = session('active_license_id');
        if ($active && in_array($active, $owned, true)) {
            return [$active];
        }

        return $owned;
    }

    public function accounts(Request $request, ?string $licenseId = null)
    {
        $licenseIds = $this->resolveLicenseIds($licenseId);

        $accounts = AccountingAccount::query()
            ->where('is_parent', false)
            ->where('is_active', true)
            ->whereIn('license_id', $licenseIds)
            ->orderBy('account_code')
            ->get(['id','license_id','account_code','account_name','person_type']);

        // bentuk respons ringkas utk select2
        return response()->json($accounts->map(fn($a) => [
            'id'           => $a->id,
            'account_code' => $a->account_code,
            'account_name' => $a->account_name,
            'person_type'  => $a->person_type,
        ]));
    }

    public function students(Request $request)
    {
        $licenseIds = $this->resolveLicenseIds($request->get('license_id'));
        $students = Student::whereIn('license_id', $licenseIds)
            ->orderBy('fullname')
            ->get(['id','fullname']);

        return response()->json($students->map(fn($s) => [
            'id'   => $s->id,
            'name' => $s->fullname,
        ]));
    }

    public function employees(Request $request)
    {
        $licenseIds = $this->resolveLicenseIds($request->get('license_id'));

        $employees = Employee::whereHas('licenses', function ($q) use ($licenseIds) {
                $q->whereIn('employee_license.license_id', $licenseIds);
            })
            ->orderBy('fullname')
            ->get(['id','fullname']);

        return response()->json($employees->map(fn($e) => [
            'id'   => $e->id,
            'name' => $e->fullname,
        ]));
    }

     public function licenseholders(Request $request)
    {
        $licenseIds = $this->resolveLicenseIds($request->get('license_id'));

        $licenseholders = User::whereHas('licenses', function ($q) use ($licenseIds) {
                $q->whereIn('licenses.id', $licenseIds);
            })
            ->orderBy('name')
            ->get(['id','name']);

        return response()->json($licenseholders->map(fn($e) => [
            'id'   => $e->id,
            'name' => $e->name,
        ]));
    }

    /** dipakai jika account.person_type == 'license' */
    public function licenses(Request $request)
    {
        $licenseIds = $this->resolveLicenseIds($request->get('license_id'));

        $licenses = License::whereIn('id', $licenseIds)
            ->orderBy('name')
            ->get(['id','name']);

        return response()->json($licenses->map(fn($l) => [
            'id'   => $l->id,
            'name' => $l->name,
        ]));
    }
}
