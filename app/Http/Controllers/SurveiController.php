<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survei;
use App\Models\Pertanyaan;
use Illuminate\Support\Facades\Auth;
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
  
        try {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after:tgl_mulai',
            'jumlah_responden' => 'required|numeric',
            'tanya.*' => 'required|string|max:255',
            'opsi_1.*' => 'required|string|max:255',
            'opsi_2.*' => 'required|string|max:255',
            'opsi_3.*' => 'required|string|max:255',
            'opsi_4.*' => 'required|string|max:255',
            'opsi_5.*' => 'required|string|max:255',
        ]);

        $id_klien = auth()->user()->id_klien; // Assuming the user is logged in and 'id' is the user's ID.

        $survei = Survei::create([
            'id_klien' => $id_klien,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'jumlah_responden' => $request->jumlah_responden,
            'status' => 'Sortir'
        ]);


        // Add questions and options

        foreach( $request->tanya as $key => $value ) {

            $id_survei = $survei->id_survei;
            $pertanyaan = $request->tanya[ $key ];
            $opsi_1 = $request->opsi_1[ $key ];
            $opsi_2 = $request->opsi_2[ $key ];
            $opsi_3 = $request->opsi_3[ $key ];
            $opsi_4 = $request->opsi_4[ $key ];
            $opsi_5 = $request->opsi_5[ $key ];

            $pertanyaan = Pertanyaan::create([
                'id_survei' => $id_survei,
                'pertanyaan' => $pertanyaan,
                'opsi_1' => $opsi_1,
                'opsi_2' => $opsi_2,
                'opsi_3' => $opsi_3,
                'opsi_4' => $opsi_4,
                'opsi_5' => $opsi_5,
            ]);

        }

        // foreach ($request->pertanyaanArray as $pertanyaanData) {
        //     $pertanyaan = Pertanyaan::create([
        //         'id_survei' => $survei->id_survei,
        //         'pertanyaan' => $pertanyaanData['pertanyaan'],
        //         'opsi_1' => $pertanyaanData['opsi_1'],
        //         'opsi_2' => $pertanyaanData['opsi_2'],
        //         'opsi_3' => $pertanyaanData['opsi_3'],
        //         'opsi_4' => $pertanyaanData['opsi_4'],
        //         'opsi_5' => $pertanyaanData['opsi_5'],
        //     ]);
        // }
        
        return response()->json([
            'message' => 'Survei dan Pertanyaan berhasil disimpan'
        ], 200);

        // Add questions and options
        return redirect()->route('detail_survei')->with('success', 'Survei Anda Berhasil Ditambahkan!');
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function validasi_admin(Request $request, $id_survei)
    {
        try {
            $request->validate([
                'deskripsi_bayar' => 'required',
                'nominal' => 'required',
                'poin' => 'required|numeric',

            ]);
            $survei = Survei::where('id_survei', $id_survei)->first();
            $survei = Survei::where('id_survei', $id_survei)->pertanyaan->count();

            $survei->update([
                'deskripsi_bayar' => $request->deskripsi_bayar,
                'nominal' => $request->nominal,
                'poin' => $request->poin,
                'status' => 'Belum Bayar',
            ]);

            return redirect()->back();

        } catch(\Exception $e) {
            return dump();
        }
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
        $buktiPath = $request->file('bukti')->store('public/bukti_pembayaran');
        $survei->bukti = $buktiPath;
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
    public function show($id_survei)
    {
        // $survey = Survey::find($id_klien); // Mengambil data survei berdasarkan ID
        // return view('', compact('survey'));

        $klien = Auth::user();
        $survei = $klien->survei()->findOrFail($id_survei);
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
}
