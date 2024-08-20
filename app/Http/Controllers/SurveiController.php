<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survei;
use App\Models\Pertanyaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class SurveiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kliensurvei = Auth::user()->survei;
        // $survei = Survei::all();
        return view('klien.detail_survei', compact('kliensurvei'));
    }

    public function index_resposden()
    {
        $survei = Survei::all();

        return view('responden.detail_survei', compact('survei'));
    }



    public function respondensurvei($id_survei)
    {
        // Dapatkan survei berdasarkan id dengan pertanyaannya
        $survei = Survei::with('pertanyaan')->findOrFail($id_survei);
        dd($survei);
        // Return view dengan survei dan pertanyaan
        return view('responden.detail_survei', compact('survei'));

    }
    public function index_pembayaran()
    {
        $kliensurvei = Auth::user()->survei;
        return view('klien.daftar_pembayaran', compact('kliensurvei'));
    }

    public function index_verifikasi()
    {
        $kliensurvei = Auth::user()->survei;
        return view('klien.verifikasi', compact('kliensurvei'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klien.buatsurvei');
    }

    public function create2()
    {
        return view('klien.buatsurvei2');
    }

    public function showQuestion() {
        return view('survey_question');
    }

    public function submit(Request $request) {
        // Handle form submission
        $data = $request->validate([
            'question' => 'required|string',
        ]);

        // Save the data
        // SurveyResponse::create($data);

        return redirect()->route('surveys.question')->with('success', 'Survey submitted successfully!');
    }

    public function paketPertanyaan()
{
    // Mengambil survei dan pertanyaan terkait untuk klien
    $kliensurvei = Auth::user()->survei()->with('pertanyaan')->get();

    return view('klien.paket_pertanyaan', compact('kliensurvei'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return dump($request);

        // ddd( $request );
        // try {
        // $request->validate([
        //     'judul' => 'required',
        //     'deskripsi' => 'required',
        //     'tgl_mulai' => 'required|date',
        //     'tgl_selesai' => 'required|date|after:tgl_mulai',
        //     'jumlah_responden' => 'required|numeric',
        //     'tanya.*' => 'required|string|max:255',
        //     'opsi_1.*' => 'required|string|max:255',
        //     'opsi_2.*' => 'required|string|max:255',
        //     'opsi_3.*' => 'required|string|max:255',
        //     'opsi_4.*' => 'required|string|max:255',
        //     'opsi_5.*' => 'required|string|max:255',
        // ]);

        // $id_klien = auth()->user()->id_klien; // Assuming the user is logged in and 'id' is the user's ID.

        // $survei = survei::create([
        //     'id_klien' => $id_klien,
        //     'judul' => $request->judul,
        //     'deskripsi' => $request->deskripsi,
        //     'tgl_mulai' => $request->tgl_mulai,
        //     'tgl_selesai' => $request->tgl_selesai,
        //     'jumlah_responden' => $request->jumlah_responden,
        //     'status' => 'Sortir',
        //     'poin' => '5',
        // ]);


        // // Add questions and options

        // foreach( $request->tanya as $key => $value ) {

        //     $id_survei = $survei->id_survei;
        //     $pertanyaan = $request->tanya[ $key ];
        //     $opsi_1 = $request->opsi_1[ $key ];
        //     $opsi_2 = $request->opsi_2[ $key ];
        //     $opsi_3 = $request->opsi_3[ $key ];
        //     $opsi_4 = $request->opsi_4[ $key ];
        //     $opsi_5 = $request->opsi_5[ $key ];

        //     $pertanyaan = Pertanyaan::create([
        //         'id_survei' => $id_survei,
        //         'pertanyaan' => $pertanyaan,
        //         'opsi_1' => $opsi_1,
        //         'opsi_2' => $opsi_2,
        //         'opsi_3' => $opsi_3,
        //         'opsi_4' => $opsi_4,
        //         'opsi_5' => $opsi_5,
        //     ]);

        // }

        try {
            $request->validate([
                'judul' => 'required',
                'deskripsi' => 'required',
                'tgl_mulai' => 'required|date',
                'tgl_selesai' => 'required|date|after:tgl_mulai',
                'jumlah_responden' => 'required|numeric',
                'tanya.*' => 'required|string|max:255',
                'opsi_1.*' => 'nullable|string|max:255',
                'opsi_2.*' => 'nullable|string|max:255',
                'opsi_3.*' => 'nullable|string|max:255',
                'opsi_4.*' => 'nullable|string|max:255',
                'opsi_5.*' => 'nullable|string|max:255',
                'essai.*' => 'nullable|string|max:255',
            ]);

            $id_klien = auth()->user()->id_klien; // Assuming the user is logged in and 'id_klien' is the user's ID.

            $survei = Survei::create([
                'id_klien' => $id_klien,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_selesai' => $request->tgl_selesai,
                'jumlah_responden' => $request->jumlah_responden,
                'status' => 'Sortir',
                'poin' => '5',
            ]);

            foreach ($request->tanya as $key => $value) {
                // Check if the question is an essay or multiple-choice
                if ($request->question_type[$key] == 'essay') {
                    Pertanyaan::create([
                        'id_survei' => $survei->id_survei,
                        'pertanyaan' => $value,
                        'type' => 'essay', // Assume you have a 'type' field to distinguish question types
                    ]);
                } else {
                    Pertanyaan::create([
                        'id_survei' => $survei->id_survei,
                        'pertanyaan' => $value,
                        'opsi_1' => $request->opsi_1[$key],
                        'opsi_2' => $request->opsi_2[$key],
                        'opsi_3' => $request->opsi_3[$key],
                        'opsi_4' => $request->opsi_4[$key],
                        'opsi_5' => $request->opsi_5[$key],
                        'type' => 'multiple_choice',
                    ]);
                }
            }

            return redirect()->route('detail_survei')->with('success', 'Survei Anda Berhasil Ditambahkan!');
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
        return Redirect::route('detail_survei')
            ->with('message', 'Survei dan Pertanyaan berhasil disimpan');

        // Add questions and options
        // return redirect()->route('detail_survei')->with('success', 'Survei Anda Berhasil Ditambahkan!');
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'error' => $e->getMessage()
        //     ], 500);
        // }
    }

    // SurveyController.php
public function jawabSurvei($id_survei)
{
    $survei = Survei::findOrFail($id_survei);
    $pertanyaan = $survei->pertanyaan; // Sesuaikan dengan relasi model
    return view('responden.jawab_survei2', compact('survei', 'pertanyaan'));
}



    public function validasi_setuju(Request $request, $id_survei)
    {
        // try {
            $validator = $request->validate([
                'rincian_harga' => 'required|string',
                'nominal' => 'required|numeric',
                'poin' => 'required|numeric',

            ],[
                'rincian_harga.required' => 'Rincian harga harus diisi.',
                'nominal.required' => 'Nominal harga harus diisi.',
                'poin.required' => 'Poin survei harus diisi.',
            ]);


            $survei = Survei::find($id_survei);
            // $survei = Survei::where('id_survei', $id_survei)->pertanyaan->count();

            if (!$survei) {
                return redirect()->back()->with('error', 'Survei not found');
            }

            $survei->status = 'Belum Bayar';
            $survei->nominal = $request->input('nominal');
            $survei->rincian_harga = $request->input('rincian_harga');
            $survei->poin = $request->input('poin');

            // Save the changes
            $survei->save();

            return redirect()->route('sudah_bayar')->with('success', 'Survei Telah Divalidasi');

        // } catch(\Exception $e) {
        //     return dump();
        // }
    }

    public function validasi_tolak(Request $request, $id_survei)
    {
        $validator = $request->validate([
            'deskripsi_validasi' => 'required|string',
        ],[
            'deskripsi_validasi.required' => 'Alasan dibatalkan harus diisi.',
        ]);

        $survei = Survei::find($id_survei);
        if (!$survei) {
            return redirect()->back()->with('error', 'Survei not found');
        }

        // Update the survey status and other fields
        $survei->status = 'Ditolak';
        $survei->deskripsi_validasi = $request->input('deskripsi_validasi');

        // Save the changes
        $survei->save();

        return redirect()->route('dibatalkan')->with('success', 'Survei Berhasil Ditolak');

    }

    public function terima_bayar($id_survei)
    {
        $survei = Survei::find($id_survei);
        if (!$survei) {
            return redirect()->back()->with('error', 'Survei not found');
        }

        // Update the survey status and other fields
        $survei->status = 'Disetujui';

        $survei->save();

        return redirect()->route('disetujui')->with('success', 'Survei Berhasil Ditolak');
    }

    public function tolak_bayar(Request $request, $id_survei)
    {
        $validator = $request->validate([
            'deskripsi_validasi' => 'required|string',
        ],[
            'deskripsi_validasi.required' => 'Alasan dibatalkan harus diisi.',
        ]);

        $survei = Survei::find($id_survei);
        if (!$survei) {
            return redirect()->back()->with('error', 'Survei not found');
        }

        $survei->status = 'Ditolak';
        $survei->deskripsi_validasi = $request->input('deskripsi_validasi');

        $survei->save();

        return redirect()->route('dibatalkan')->with('success', 'Survei Berhasil Ditolak');
    }

    public function store_pembayaran(Request $request)
    {
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $survei = Survei::find($request->id_survei);

        if (!$survei) {
            return redirect()->back()->with('error', 'Survey not found.');
        }

        // Upload and save the payment proof
        $bukti = $request->file('bukti');
        $buktiName = time() . '_' . $bukti->getClientOriginalName();
        $bukti->storeAs('public/bukti_pembayaran', $buktiName);

        $survei->bukti = 'bukti_pembayaran/' . $buktiName;
        $survei->status = 'Sudah Bayar';
        $survei->save();

        return redirect()->route('verifikasi')->with('success', 'Pembayaran Anda Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_detail($id_survei)
    {
        // $survey = Survey::find($id_klien); // Mengambil data survei berdasarkan ID
        // return view('', compact('survey'));

        $klien = Auth::user();
        $survei = $klien->Survei()->findOrFail($id_survei);
        $pertanyaan = $survei->pertanyaan;

        return view('klien.detail_survei2', compact('survei', 'pertanyaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function getBuktiPembayaran($id_survei)
    {
        // Asumsikan nama file bukti pembayaran adalah id_survei.jpg
        $filePath = public_path('bukti_pembayaran/' . $id_survei . '.jpg');

        if (file_exists($filePath)) {
            return response()->file($filePath);
        } else {
            return response()->json(['message' => 'Bukti pembayaran tidak ditemukan.'], 404);
        }
    }

}
