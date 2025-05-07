<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    public function aboutUs() {
        return view('company.aboutus');
    }

    public function contact() {
        return view('company.contact');
    }

    public function send(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Opcionális: email küldése (kommentben hagyva, ha kell, aktiválhatod)
        /*
        Mail::to('info@fixandgo.hu')->send(new \App\Mail\ContactFormMail([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]));
        */

        // Sikeres válasz visszaadása
        return back()->with('success', 'Üzeneted sikeresen elküldve!');
    }
}
