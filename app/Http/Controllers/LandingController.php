<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landingPage.landingPage'); // Mengembalikan tampilan landing page yang sesuai
    }
}
