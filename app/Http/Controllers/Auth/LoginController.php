<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected function redirectTo()
{
    $user = auth()->user();

    if ($user->hasRole('Super-Admin') || $user->hasRole('Pemilik Lisensi') || $user->hasRole('Karyawan')) {
        return '/dashboard';
    }

    return '/employees';  // fallback    
}

protected function authenticated(Request $request, $user)
{
    $user->update([
        'last_login_at' => Carbon::now('Asia/Jakarta'),
    ]);
    
    if ($user->hasRole('Super-Admin')) return;

    $license = null;

    if ($user->hasRole('Pemilik Lisensi')) {
        $license = \App\Models\License::whereHas('owners', fn($q) => $q->where('users.id', $user->id))->first();
    } elseif ($user->hasRole('Karyawan') && $user->employee) {
        $license = $user->employee->licenses->first();
    }

    if ($license) {
        session([
            'active_license_id' => $license->id,
            'active_license_name' => $license->name,
        ]);
    }
}



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}


