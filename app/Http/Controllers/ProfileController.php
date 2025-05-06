<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
