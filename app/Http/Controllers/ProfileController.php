<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

      public function index() {
    
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }
    
    public function edit(Request $request): View {
    
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    
    public function update(ProfileUpdateRequest $request): RedirectResponse {
    
        $user = $request->user();

        // 1. Update data profil
        $user->fill($request->only('name', 'email'));

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // 2. Jika password diisi, maka validasi dan update password
        if ($request->filled('current_password') && $request->filled('password')) {

            $user->update([
                'password' => Hash::make($request->password),
            ]);

            
        }

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }



    /**
     * Delete the user's account.
     */
    // public function destroy(Request $request): RedirectResponse {
    
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
}
