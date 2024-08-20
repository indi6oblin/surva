<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Admin;
use App\Models\Klien;
use App\Models\Responden;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index_admin()
    {
        $klien = Klien::count();
        $admin = Admin::count();
        $responden = Responden::count();
        return view('home',compact('klien', 'admin', 'responden'));
    }
}
