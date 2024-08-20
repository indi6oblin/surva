@extends('layouts.master')
@section('menu')
    @extends('responden.sidebar.riwayat_survei')
@endsection
@section('content')
<link href="landingPage/assets/img/logoapp.png" rel="icon">
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="page-content">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Daftar Survei</h3>
                        <p class="text-subtitle text-muted">Daftar Survei Anda</p>
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
            <<div class="page-content">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Daftar Survei
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Survei</th>
                                        <th style="max-width: 450px;">Deskripsi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $survei as $key => $survei)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $survei->judul }}</td>
                                        <td style="max-width: 450px; overflow: hidden; text-overflow: ellipsis;">{{ $survei->deskripsi }}</td>
                                        <td>{{ $survei->tgl_selesai }}</td>
                                        {{-- <td>
                                            @php
                                                $status_pengisian = $survei->status_pengisian ;
                                                $badgeColor = '';

                                                switch ($status_pengisian) {
                                                    case 'Belum':
                                                        $badgeColor = 'bg-secondary';
                                                        break;

                                                    case 'Sudah Bayar':
                                                        $badgeColor = 'bg-info';
                                                        break;
                                                    case 'Selesai':
                                                        $badgeColor = 'bg-success';
                                                        break;
                                                    case 'Ditolak':
                                                        $badgeColor = 'bg-dark';
                                                        break;
                                                    // Add more cases as needed
                                                    default:
                                                        $badgeColor = 'bg-warning';
                                                }
                                            @endphp

                                             <span class="badge {{ $badgeColor }}">{{ $status_pengisian }}</span> --}}

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
