@extends('layouts.master')
@section('menu')
    @extends('klien.sidebar.pembayaran')
@endsection
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        {!! Toastr::message() !!}
        <div class="page-content">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Daftar Pembayaran</h3>
                        <p class="text-subtitle text-muted">Daftar Pembayaran Survei Anda</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home_klien') }}">Survei</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Daftar Pembayaran</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            {!! Toastr::message() !!}
        <div class="page-content">
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
                                    <th>Nama Survei</th>
                                    <th>Harga</th>
                                    <th style="max-width: 160px;">Rincian</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 0;
                                @endphp
                                @foreach ( $kliensurvei as $key => $survei)
                                @if ($survei->status == 'Belum Bayar')

                                <tr>
                                    <td>{{ ++$counter }}</td>
                                    <td>{{ $survei->judul }}</td>
                                    <td>{{ $survei->nominal }}</td>
                                    <td style="max-width: 160px; overflow: hidden; text-overflow: ellipsis;">{{ $survei->rincian_harga }}</td>
                                    <td>
                                        <a href="{{ route('pembayaran', ['id_survei' => $survei->id_survei]) }}"><i class="bi bi-wallet2"> </i>Bayar</button>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger">Belum Bayar</span>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>

        </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted d-flex justify-content-center align-items-end">
                <div class="float-start">
                    <p>2023 &copy; Aplikasi Survey dan Analisis Data</p>
                </div>
            </div>
        </footer>
    </div>
@endsection
