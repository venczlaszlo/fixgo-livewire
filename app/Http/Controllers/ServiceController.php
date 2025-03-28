<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;

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
        return view('services.automento');
    }

    public function index($type) {
        $services = Service::where('type', $type)->get();
        return view('services.index', compact('services'));
    }
}

