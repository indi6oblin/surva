<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use App\Models\Klien;
use App\Models\paket_pertanyaan;
use App\Models\Responden;
use App\Models\Survei;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $klien = Klien::count();
        $admin = Admin::count();
        $responden = Responden::count();
        $survei_count = Survei::count();
        $survei = DB::table('survei')->get();

        foreach ($survei as $key => $item) {
            $tgl_mulai = Carbon::parse($item->tgl_mulai);
            $tgl_selesai = Carbon::parse($item->tgl_selesai);
            $target_days = $tgl_mulai->diffInDays($tgl_selesai);
            $totalPertanyaan = DB::table('pertanyaan')->where('id_survei', $item->id_survei)->count();

            $item->target_days = $target_days;
            $item->total_pertanyaan = $totalPertanyaan;
        }

        return view('admin.home_admin', compact('klien', 'admin', 'survei_count', 'responden', 'survei'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function kelola_klien()
    {
        $klien_count = Klien::count();
        $klien = Klien::all();

        foreach ($klien as $item) {
            $item->jumlah_survei = Survei::where('id_klien', $item->id_klien)->count();
        }

        return view('admin.klien', compact('klien','klien_count'));
    }

    public function hapus_klien(Request $request, $id_klien)
    {
        $klien = Klien::find($id_klien);
        if ($klien) {
            $klien->delete();
            return Redirect::back()->with('success', 'Klien berhasil dihapus');
        } else {
            return Redirect::back()->with('error', 'Klien tidak ditemukan');
        }
    }

    public function kelola_responden()
    {
        $responden_count = Responden::count();
        $responden = Responden::all();

        return view('admin.responden', compact('responden','responden_count'));
    }

    public function hapus_responden(Request $request, $id_responden)
    {
        $responden = Responden::find($id_responden);
        if ($responden) {
            $responden->delete();
            return Redirect::back()->with('success', 'Responden berhasil dihapus');
        } else {
            return Redirect::back()->with('error', 'Responden tidak ditemukan');
        }
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



    public function paket_pertanyaan($id_pertanyaan)
    {
        $pertanyaan = Pertanyaan::findOrFail($id_pertanyaan);
        $paketpertanyaan = paket_pertanyaan::where('paket_pertanyaan', $pertanyaan->paket_pertanyaan)->get();

        return view('admin.paket_pertanyaan', compact('pertanyaan', 'paketpertanyaan'));
    }
}
