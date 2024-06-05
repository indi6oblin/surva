<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class LoginRespondenController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Responden Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating respondents for the application.
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
     * Show the login form for the respondent.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login_responden');
    }

    /**
     * Handle login for the respondent.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the login request
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ], [
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Format password tidak valid.',
            'password.min' => 'Panjang password minimal 8 karakter.',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf kecil, satu huruf besar, satu angka.',
        ]);

        // Attempt to log in the respondent
        if (Auth::attempt($credentials)) {
            Toastr::success('Autentikasi Berhasil :)', 'Sukses!');
            return redirect()->intended('/dashboard_responden');
        }

        Toastr::error('Gagal, Username atau Password Salah :)', 'Error');
        return redirect()->route('login_responden');
    }

    /**
     * Log out the respondent.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        Toastr::success('Anda Berhasil Keluar :)', 'Sukses!');
        return redirect()->route('login_responden');
    }
}
