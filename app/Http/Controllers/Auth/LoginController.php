<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Klien;
use Carbon\Carbon;
use Session;
use Brian2694\Toastr\Facades\Toastr;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'locked',
            'unlock'
        ]);
        // $this->middleware('guest:admin')->except([
        //     'logout',
        //     'locked',
        //     'unlock'
        // ]);
    }

    public function login()
    {

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username    = $request->username;
        $password = $request->password;

        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();

        // if ($request->role == 'klien') {
            if (Auth::attempt(['username' => $username, 'password' => $password])) {
                Toastr::success('Autentikasi Berhasil :)', 'Sukses!');
                return redirect()->intended('/dashboard_klien');
            }
            Toastr::error('Gagal, Username atau Password Salah :)', 'Error');
            return redirect('login');
        // } elseif ($request->role == 'admin') {
        //     if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {
        //         Toastr::success('Login successfully :)', 'Success');
        //         return redirect()->intended('/dashboard_admin');
        //     }
        //     Toastr::error('fail, WRONG USERNAME OR PASSWORD :)', 'Error');
        //     return redirect('login');
        // } else {
        //     Toastr::error('fail, WRONG USERNAME OR PASSWORD :)', 'Error');
        //     return redirect('login');
        }
        // if (Auth::attempt(['username'=>$username,'password'=>$password])) {
        //     Toastr::success('Login successfully :)','Success');
        //     return redirect()->intended('/');
        // }elseif (Auth::guard('admin')->attempt(['username'=>$username,'password'=>$password])) {
        //     Toastr::success('Login successfully :)','Success');
        //     return redirect()->intended('/');
        // }
        // else{
        //     Toastr::error('fail, WRONG USERNAME OR PASSWORD :)','Error');
        //     return redirect('login');
        // }
    // }

    public function logout()
    {
        // $klien = Auth::logout();
        // $admin = Auth::Admin();
        // Session::put('klien', $klien);
        // Session::put('admin', $admin);
        // $admin=Session::get('admin');
        // $klien=Session::get('klien');

        // $username       = $klien->username;
        // $username       = $admin->username;
        // $email      = $klien->email;
        // $email      = $admin->email;
        // $dt         = Carbon::now();
        // $todayDate  = $dt->toDayDateTimeString();
        Auth::logout();
        // Auth::guard('admin')->logout();
        Toastr::success('Anda Berhasil Keluar :)', 'Sukses!');
        return redirect('login');
    }
}
