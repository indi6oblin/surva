<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Survei;
use App\Models\Responden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RespondenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Responden = Responden::all();
        $Respondensurvei = Auth::user()->survei;

        return view('responden.home', ['responden' => $Responden], compact('respondensurvei'));
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
        return view('Responden.detail_survei2');
    }

    /**
     * Proses autentikasi untuk responden.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login_responden(Request $request)
    {
        // Logika autentikasi untuk responden
    }


    public function pembayaran(Request $request, $id_survei)
    {
        $survei = Survei::find($request->id_survei);
        return view('Responden.pembayaran', compact('survei'));
    }

    public function daftar_pembayaran()
    {
        return view('Responden.daftar_pembayaran');
    }

    public function verifikasi()
    {
        return view('Responden.verifikasi');
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
        $id_Responden = Auth::user()->id_Responden;
        $Responden = Responden::find($id_Responden);

        return view('Responden.profil', compact('Responden'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id_Responden)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $id_Responden = Auth::user()->id_Responden;
        $Responden = Responden::find($id_Responden);

        // Memperbarui nilai-nilai yang diubah
        $Responden->nama = $request->input('nama');
        $Responden->username = $request->input('username');
        $Responden->email = $request->input('email');

        $Responden->save();

        return redirect()->route('editprofil')->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request, string $id_Responden)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8',
        ]);

        $id_Responden = auth()->user()->id_Responden;
        $Responden = Responden::find($id_Responden);

// Check if the entered old password matches the hashed stored password
if (!Hash::check($request->input('password_lama'), $Responden->password)) {
    return redirect()->back()->with('error', 'Password lama tidak sesuai.');
}

// Update the user's password with the new hashed password
$Responden->password = bcrypt($request->input('password_baru'));
$Responden->save();

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
// Your destroy logic here
}
}
