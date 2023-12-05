<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Klien;
use App\Models\Responden;
use App\Models\Survei;
use DB;
use Carbon\Carbon;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $klien = Klien::count();
        $admin = Admin::count();
        $responden = Responden::count();
        $survei_count = Survei::count();
        $survei = DB::table('survei')->get();

        // Calculate target days for each survey
        foreach ($survei as $key => $item) {
            $tgl_mulai = Carbon::parse($item->tgl_mulai);
            $tgl_selesai = Carbon::parse($item->tgl_selesai);
            $target_days = $tgl_mulai->diffInDays($tgl_selesai);
            $totalPertanyaan = DB::table('pertanyaan')->where('id_survei', $item->id_survei)->count();

            // Add the calculated target days to the $item object
            $item->target_days = $target_days;
            $item->total_pertanyaan = $totalPertanyaan;
        }

        return view('admin.home_admin', compact('klien', 'admin', 'survei_count', 'responden', 'survei'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function sortir_admin()
    {
        $survei = DB::table('survei')->get();

        foreach ($survei as $key => $item) {
            $tgl_mulai = Carbon::parse($item->tgl_mulai);
            $tgl_selesai = Carbon::parse($item->tgl_selesai);
            $target_days = $tgl_mulai->diffInDays($tgl_selesai);
            $totalPertanyaan = DB::table('pertanyaan')->where('id_survei', $item->id_survei)->count();

            $item->target_days = $target_days;
            $item->total_pertanyaan = $totalPertanyaan;
        }
        return view('admin.sortir_admin', compact('survei'));
    }

    public function detail_survei_sortir($id_survei)
    {
        $survei = Survei::findOrFail($id_survei);
        $pertanyaan = $survei->pertanyaan;

        return view('admin.detail_survei_sortir', compact('survei', 'pertanyaan'));
    }

    public function detail_survei_home()
    {
        return view('admin.detail_survei_home');
    }

    public function sudah_bayar()
    {
        $survei = DB::table('survei')->get();

        foreach ($survei as $key => $item) {
            $tgl_mulai = Carbon::parse($item->tgl_mulai);
            $tgl_selesai = Carbon::parse($item->tgl_selesai);
            $target_days = $tgl_mulai->diffInDays($tgl_selesai);
            $totalPertanyaan = DB::table('pertanyaan')->where('id_survei', $item->id_survei)->count();

            $item->target_days = $target_days;
            $item->total_pertanyaan = $totalPertanyaan;
        }
        return view('admin.sudah_bayar', compact('survei'));
    }

    public function detail_sudah_bayar($id_survei)
    {
        $survei = Survei::findOrFail($id_survei);
        $pertanyaan = $survei->pertanyaan;

        return view('admin.detail_sudah_bayar', compact('survei'));
    }

    public function disetujui()
    {
        $survei = DB::table('survei')->get();

        foreach ($survei as $key => $item) {
            $tgl_mulai = Carbon::parse($item->tgl_mulai);
            $tgl_selesai = Carbon::parse($item->tgl_selesai);
            $target_days = $tgl_mulai->diffInDays($tgl_selesai);
            $totalPertanyaan = DB::table('pertanyaan')->where('id_survei', $item->id_survei)->count();

            $item->target_days = $target_days;
            $item->total_pertanyaan = $totalPertanyaan;
        }
        return view('admin.disetujui', compact('survei'));
    }

    public function detail_disetujui($id_survei)
    {
        $survei = Survei::findOrFail($id_survei);
        $pertanyaan = $survei->pertanyaan;

        return view('admin.detail_disetujui', compact('survei', 'pertanyaan'));
    }

    public function dibatalkan()
    {
        $survei = DB::table('survei')->get();

        foreach ($survei as $key => $item) {
            $tgl_mulai = Carbon::parse($item->tgl_mulai);
            $tgl_selesai = Carbon::parse($item->tgl_selesai);
            $target_days = $tgl_mulai->diffInDays($tgl_selesai);
            $totalPertanyaan = DB::table('pertanyaan')->where('id_survei', $item->id_survei)->count();

            $item->target_days = $target_days;
            $item->total_pertanyaan = $totalPertanyaan;
        }
        return view('admin.dibatalkan', compact('survei'));
    }

    public function detail_dibatalkan($id_survei)
    {
        $survei = Survei::findOrFail($id_survei);
        $pertanyaan = $survei->pertanyaan;

        return view('admin.detail_dibatalkan', compact('survei', 'pertanyaan'));
    }
}
