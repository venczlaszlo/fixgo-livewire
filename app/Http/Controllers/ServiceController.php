<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function alkatreszkereskedo() {
        return view('services.alkatreszkereskedok');
    }

    public function autoszerelo() {
        return view('services.autoszerelo');
    }

    public function gumiszerviz() {
        return view('services.gumiszerviz');
    }

    public function automoso() {
        return view('services.automoso');
    }

    public function automentok() {
        return view('services.automentok');
    }

    public function index($type) {
        $services = Service::where('type', $type)->get();
        return view('services.index', compact('services'));
    }

    // ÚJ: szolgáltatás részletes megjelenítése slug alapján
    public function show($slug) {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('services.show', compact('service'));
    }

    public function uploadImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $service = Service::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // Frissítjük a képet az adatbázisban
            $service->image = $imageName;
            $service->save();
        }

        return back()->with('success', 'Kép sikeresen feltöltve!');
    }
}
