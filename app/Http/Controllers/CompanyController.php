<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function aboutUs() {
        return view('company.aboutus');
    }

    public function contact() {
        return view('company.contact');
    }
}
