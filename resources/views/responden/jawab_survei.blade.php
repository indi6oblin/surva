@extends('layouts.master')

@section('menu')
    @extends('responden.sidebar.jawab_survei')
@endsection

@section('content')
<link href="landingPage/assets/img/logoapp.png" rel="icon">
    <style>
        /* Custom CSS untuk memastikan sidebar dan konten berada dalam satu baris */
        .container-fluid {
            display: flex;
            flex-wrap: nowrap;
        }

        .sidebar {
            flex: 0 0 250px;
            max-width: 250px;
            margin-right: 20px;
        }

        .content {
            flex: 1;
        }
    </style>

    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <!-- Toastr notifications -->
        {!! Toastr::message() !!}
        <div class="page-content">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Jawab Survei</h3>
                        <p class="text-subtitle text-muted">Pilih Survei untuk dijawab</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Survei</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Survei</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section id="content-types">
                <div class="row">
                    @forelse ($survei as $survei)
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $survei->judul }}</h4>
                                    <p class="card-text">
                                        {{ $survei->deskripsi }}
                                    </p>
                                    <div class="d-flex">
                                        <a href="{{ route('jawabsurvei2', $survei->id_survei) }}" class="btn btn-primary btn-sm ml-auto" onclick="confirmSetuju()">Jawab Survei</a>
                                    </div>
                                    <br>
                                    <h6>Jumlah Poin Survei: {{ $survei->poin }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            <h4 class="alert-heading">SURVEI TIDAK TERSEDIA</h4>
                            <p>Belum ada survei yang tersedia untuk dijawab saat ini. Silakan cek kembali nanti.</p>
                        </div>
                    </div>
                    @endforelse
                </div>
            </section>
        </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted d-flex justify-content-center align-items-end">
                <div class="float-start">
                    <p>2024 &copy; Aplikasi Survey dan Analisis Data</p>
                </div>
            </div>
        </footer>
    </div>
@endsection
