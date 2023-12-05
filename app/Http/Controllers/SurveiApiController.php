<?php

namespace App\Http\Controllers;

use App\Models\Responden;
use App\Models\Survei;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SurveiApiController extends Controller
{
    public function index()
    {
        $surveis = Survei::all();
        return response()->json(['messange' => 'success', 'data' => $surveis]);
    }

    public function register(Request $request)
    {
        $rules = [
            'nama' => 'required|string',
            'username' => 'required|string|unique:responden',
            'email' => 'required|string|unique:responden',
            'password' => 'required|string|min:8',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = Responden::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken('Personal Acces Token')->plainTextToken;
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
            $token = $user->createToken('Personal Acces Token')->plainTextToken;
            $response = ['user' => $user, 'token' => $token];
            return response()->json($response, 200);
        }
        $response = ['message' => 'Incorrect email or password'];
        return response()->json($response, 400);
    }
}
