<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Carbon\Carbon;
use Session;
use Brian2694\Toastr\Facades\Toastr;

class LoginAdminController extends Controller
{
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
        // $this->middleware('guest')->except([
        //     'logout',
        //     'locked',
        //     'unlock'
        // ]);
        $this->middleware('guest:admin')->except([
            'logout',
            'locked',
            'unlock'
        ]);
    }

    public function login_admin()
    {

        return view('auth.login_admin');
    }

    public function authenticate(Request $request)
    {
        $validator = $request->validate([
            'username' => 'required|string',
            'password'  => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*\d).+$/',
            ],
        ],[
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Format password tidak valid.',
            'password.min' => 'Panjang password minimal :min karakter.',
            'password.regex' => 'Password harus mengandung setidaknya satu angka dan tidak mengandung simbol.',
        ]);

        $username = $request->username;
        $password = $request->password;

        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();

        // if ($request->role == 'klien') {
            if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {
                Toastr::success('Autentikasi Berhasil :)', 'Sukses!');
                return redirect()->intended('/dashboard_admin');
            }
            Toastr::error('Gagal, Username atau Password Salah :)', 'Error');
            return redirect('loginadmin');
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
        // Auth::logout();
        Auth::guard('admin')->logout();
        Toastr::success('Anda Berhasil Keluar :)', 'Sukses!');
        return redirect('loginadmin');
    }

}
