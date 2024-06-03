<?php

namespace App\Http\Controllers;

use App\Http\Resources\SurveiCollection;
use App\Models\Hasil_survei;
use App\Models\Pertanyaan;
use App\Models\Survei_terjawab;
use App\Models\Responden;
use App\Models\Survei;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SurveiApiController extends Controller
{
    // untuk manggil table survei
    public function listSurvei($respondenId)
    {
        $surveis = Survei::where('status', 'disetujui')
                        ->get();

        $answeredSurveiIds = Survei_terjawab::where('id_responden', $respondenId)->pluck('id_survei');
        $surveisKosong = $surveis->whereNotIn('id_survei', $answeredSurveiIds);

        return new SurveiCollection($surveisKosong);
    }


    public function riwayatSurvei($respondenId)
    {
        $surveis = Survei::all();
        $answeredSurveiIds = Survei_terjawab::where('id_responden', $respondenId)->pluck('id_survei');
        $surveisKosong = $surveis->whereIn('id_survei', $answeredSurveiIds);
        return new SurveiCollection($surveisKosong);
    }

    public function surveiTerjawab(Request $request)
    {
        Survei_terjawab::create([
            'id_survei' => $request->input('id_survei'),
            'id_responden' => $request->input('id_responden'),
        ]);
    }

    // simpan hasil survei
    public function hasilSurvei(Request $request)
    {

        $rules = [
            'id_pertanyaan' => 'required|exists:pertanyaan,id_pertanyaan',
            'id_responden' => 'required|exists:responden,id_responden',
            'jawaban' => 'required|array',
        ];

        $validasi = Validator::make($request->all(), $rules);
        if ($validasi->fails()) {
            return response()->json(['message' => 'validasi gagal.']);
        }

        // Periksa apakah responden sudah mengisi survei dengan pertanyaan tertentu
        $existingResult = Hasil_survei::where('id_pertanyaan', $request->input('id_pertanyaan'))
            ->where('id_responden', $request->input('id_responden'))
            ->first();

        if ($existingResult) {
            return response()->json(['message' => 'Responden has filled this survey question before.']);
        }


        // try - catch, db transaction, db rollback;

        // Simpan hasil survei ke database
        $hasilSurvei = Hasil_survei::create([
            'id_pertanyaan' => $request->input('id_pertanyaan'),
            'id_responden' => $request->input('id_responden'),
            'hasil_opsi' => json_encode($request->input('jawaban')),
        ]);

        // Ambil informasi survei untuk mendapatkan poin

        // Dapatkan informasi survei untuk mendapatkan poin
        $survei = Survei::find($request->input('id_pertanyaan'));

        // Dapatkan poin dari model Survei
        $poinSurvei = $survei->poin;

        // Update poin pada tabel responden
        $responden = Responden::find($request->input('id_responden'));
        $responden->poin += $poinSurvei;
        $responden->save();

        return response()->json(['message' => 'Hasil survei berhasil disimpan', 'data' => $hasilSurvei]);
    }


    // untuk manggil table pertanyaan
    public function pertanyaanBySurvei($id_survei)
    {
        $survei = Survei::find($id_survei);

        if (!$survei) {
            return response()->json(['message' => 'Survei not found'], 404);
        }

        $pertanyaan = $survei->pertanyaan;

        return response()->json(['message' => 'success', 'data' => $pertanyaan]);
    }


    public function register(Request $request)
    {
        $rules = [
            'nama' => 'string',
            'username' => 'required|string|unique:responden',
            'email' => 'required|string|unique:responden',
            'password' => 'required|string|min:8',
        ];


        $rules = [
            'nama' => 'string',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Check if password contains at least one uppercase letter, one lowercase letter, one number, and one symbol
        // if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/', $request->password)) {
        //     return response()->json(['error' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one symbol.'], 400);
        // }

        $user = Responden::create([
            'nama' => 'nama',
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'poin' => '0'
        ]);
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $response = [
            'user' => $user, 'token' => $token
        ];
        return response()->json($response);
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required|string'
        ];
        $request->validate($rules);
        $user = Responden::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            // Simpankan Id User dalam session laravel
            $token = $user->createToken('Personal Acces Token')->plainTextToken;
            $response = ['user' => $user, 'token' => $token];
            return response()->json($response, 200);
        }
        $response = ['message' => 'Incorrect email or password'];
        return response()->json($response, 400);
    }
}
