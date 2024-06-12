<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Klien;
use App\Models\Survei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KlienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Check if the user is authenticated
    if (Auth::check()) {
        $user = Auth::user();
        $Klien = Klien::all();
        $kliensurvei = $user->survei; // Ensure 'survei' is a relationship on the User or Klien model

        return view('klien.home', compact('Klien', 'kliensurvei'));
    } else {
        // Redirect to login if not authenticated
        return redirect()->route('login')->withErrors('Please log in to access this page.');
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function detail_survei2()
    {
        return view('klien.detail_survei2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function pembayaran(Request $request, $id_survei)
    {
        $survei = Survei::find($request->id_survei);
        return view('klien.pembayaran', compact('survei'));
    }

    public function daftar_pembayaran()
    {
        return view('klien.daftar_pembayaran');
    }

    public function verifikasi()
    {
        return view('klien.verifikasi');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id_klien = Auth::user()->id_klien;
        $klien = Klien::find($id_klien);

        return view('klien.profil', compact('klien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id_klien)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $id_klien = Auth::user()->id_klien;
        $klien = Klien::find($id_klien);

        // Memperbarui nilai-nilai yang diubah
        $klien->nama = $request->input('nama');
        $klien->username = $request->input('username');
        $klien->email = $request->input('email');

        $klien->save();

        return redirect()->route('editprofil')->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request, string $id_klien)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8',
        ]);

        $id_klien = auth()->user()->id_klien;
        $klien = Klien::find($id_klien);

        // Check if the entered old password matches the hashed stored password
        if (!Hash::check($request->input('password_lama'), $klien->password)) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai.');
        }

        // Update the user's password with the new hashed password
        $klien->password = bcrypt($request->input('password_baru'));
        $klien->save();

        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
