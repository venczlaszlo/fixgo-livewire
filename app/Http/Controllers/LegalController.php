<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function termsOfService() {
        return view('legal.terms_of_service');
    }

    public function privacyPolicy() {
        return view('legal.privacy_policy');
    }

    public function cookiePolicy() {
        return view('legal.cookie_policy');
    }
}

