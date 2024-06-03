@extends('layouts.master')
@section('menu')
    @extends('klien.sidebar.verifikasi')
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
                        <h3>Verifikasi</h3>
                        <p class="text-subtitle text-muted">Verifikasi Survei Anda</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home_klien') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Verifikasi</li>
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
                                    <th style="max-width: 160px;">Alasan Validasi</th>
                                    <th style="max-width: 160px;">Bukti</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $kliensurvei as $key => $survei)
                                @if (in_array($survei->status, ['Sudah Bayar', 'Disetujui', 'Ditolak']))
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $survei->judul }}</td>
                                    <td>{{ $survei->nominal }}</td>
                                    <td style="max-width: 160px; overflow: hidden; text-overflow: ellipsis;">{{ $survei->rincian_harga }}</td>
                                    <td style="max-width: 160px; overflow: hidden; text-overflow: ellipsis;">{{ $survei->deskripsi_validasi }}</td>
                                    <td style="max-width: 160px; overflow: hidden; text-overflow: ellipsis;">{{ $survei->bukti }}</td>
                                    <td>
                                        @php
                                            $status = $survei->status;
                                            $badgeColor = '';

                                            switch ($status) {
                                                case 'Sudah Bayar':
                                                    $badgeColor = 'bg-info';
                                                    break;
                                                case 'Disetujui':
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

                                        <span class="badge {{ $badgeColor }}">{{ $status }}</span>
                                        {{-- <span class="badge bg-success">Disetujui</span> --}}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>


            {{-- <section class="row">
                <div class="col-12 col-lg-9">
                </div>
                <div class="col-3 col-lg-3">
                    
                    {{-- user profile modal --}}
                    
                    {{-- end user profile modal --}}

                {{-- </div> --}}
            {{-- </section> --}}

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
