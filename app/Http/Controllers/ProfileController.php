<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;

class ProfileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|max:2048',
        ]);

        $user = Auth::user();
        $path = $request->file('profile_photo')->store('profile-photos', 'public');
        $user->profile_photo_url = '/storage/' . $path;
        $user->save();

        return back()->with('success', 'Profilkép frissítve.');
    }

    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        return redirect('/')->with('success', 'Fiók törölve.');
    }

    // Felhasználó kedvenc szolgáltatásainak megjelenítése
    public function showFavorites()
    {
        $user = Auth::user();
        $favoriteServices = $user->favoriteServices;  // Az összes kedvenc szolgáltatás lekérése

        return view('profile.favorites', compact('favoriteServices'));  // Kedvenc szolgáltatások megjelenítése
    }

    public function updatePassword(Request $request)
    {
        // Validáció
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Ellenőrizzük, hogy a jelenlegi jelszó helyes-e
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'A jelenlegi jelszó helytelen.']);
        }

        // Jelszó frissítése
        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('status', 'A jelszavad sikeresen megváltozott.');
    }
}
