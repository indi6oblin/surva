<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Responden;
use App\Models\Survei;
use App\Models\Hasil_survei;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

use DB;
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
        // Logika untuk mengambil data survei untuk klien
        $kliensurvei = Survei::whereIn('status', ['Disetujui'])->get();

        return view('responden.home_responden', compact('Responden', 'kliensurvei'));
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
    public function editResponden()
    {
        // Mendapatkan data responden yang sedang login
        $responden = Auth::guard('responden')->user();

        if ($responden) {
            return view('responden.profil', compact('responden'));
        } else {
            return redirect()->route('login_responden')->withErrors('Harap login sebagai responden.');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Menyimpan data diri
    public function updateResponden(Request $request, $id_responden)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'umur' => 'required|integer',
        ]);

        $id_Responden = Auth::user()->id_Responden;
        $responden = Responden::find($id_responden);
        $responden->nama = $request->input('nama');
        $responden->username = $request->input('username');
        $responden->email = $request->input('email');
        $responden->jenis_kelamin = $request->input('jenis_kelamin');
        $responden->umur = $request->input('umur');

        $responden->save();

        return redirect()->route('editResponden')->with('Berhasil', 'Profil berhasil diperbarui.');
    }


    // Menyimpan password
    public function updatePasswordResponden(Request $request, $id_responden)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed',
        ]);

        $responden = Responden::findOrFail($id_responden);

        // Memeriksa apakah password lama benar
        if (!Hash::check($request->input('password_lama'), $responden->password)) {
            return redirect()->route('editResponden')->withErrors('Password lama tidak sesuai.');
        }

        $responden->password = bcrypt($request->input('password_baru'));
        $responden->save();

        return redirect()->route('editResponden')->with('success', 'Password berhasil diperbarui.');
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


    public function jawab_survei2($id_survei)
    {
        // Periksa apakah survei sudah diisi oleh responden
        $respondenUser = auth('responden')->user();
        $hasResponded = Hasil_Survei::where('id_responden', $respondenUser->id_responden)
            ->where('id_survei', $id_survei)
            ->exists();

        // Jika sudah diisi, kembalikan respons bahwa survei sudah diisi sebelumnya
        if ($hasResponded) {
            return response()->json(['message' => 'Anda sudah mengisi survei ini sebelumnya.']);
        }

        // Jika belum diisi, lanjutkan dengan menampilkan pertanyaan
        $pertanyaan = Pertanyaan::where('id_survei', $id_survei)->get();

        // Periksa jika tidak ada pertanyaan yang ditemukan
        if ($pertanyaan->isEmpty()) {
            abort(404, 'Pertanyaan tidak ditemukan');
        }

        // Tampilkan pertanyaan
        return view('responden.jawab_survei2', compact('pertanyaan', 'id_survei'));
    }

    public function jawab_survei()
    {
        $id_survei = Hasil_survei::pluck('id_survei')->unique()->toArray();
        $survei = Survei::where('status', 'disetujui')->whereNotIn('id_survei', $id_survei)->get();


        return view('responden.jawab_survei', compact('survei'));
    }

    public function simpanJawaban(Request $request, $id_survei)
    {
        $request->validate([
            'jawaban' => 'required',
            'id_pertanyaan' => 'required',
            'tipe' => 'required',
        ]);
        // ddd($request->tipe[0]);
        // Get authenticated user ID using 'responden' guard
        $respondenUser = auth('responden')->user();
        $respondenUserId = $respondenUser->id_responden;

        // Ensure id_responden is not null
        if (!$respondenUserId) {
            return response()->json(['error' => 'Unauthorized.']);
        }
        $hasil_survey = [];
        // ddd($request->tipe);
        foreach ($request->id_pertanyaan as $key => $value) {
            $hasil_essai = $request->tipe[$key] == 'essai' ? $request->jawaban[$key] : null;
            $hasil_opsi = $request->tipe[$key] == 'opsi' ? $request->jawaban[$key] : null;
            $hasil_survey[] = [
                'id_responden' => $respondenUserId,
                'id_pertanyaan' => $value,
                'id_survei' => $id_survei,
                'hasil_essai' => $hasil_essai,
                'hasil_opsi' => $hasil_opsi,
            ];
        }
        // ddd($hasil_survey);
        // Process and save data to database
        try {
            Hasil_survei::insert($hasil_survey);
            return redirect()->route('home_responden')->with('success', 'Survei Berhasil Disimpan.');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan jawaban.'], 500);
        }

    }
}
