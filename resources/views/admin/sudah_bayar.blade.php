@extends('layouts.master')
@section('menu')
    @extends('admin.sidebar.sudah_bayar')
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
                        <h3>Daftar Pembayaran</h3>
                        <p class="text-subtitle text-muted">Daftar Pembayaran Survei</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Survei</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Validasi Bayar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Daftar Pembayaran
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Survei</th>
                                    <th>Jumlah Pertanyaan</th>
                                    <th>Jumlah Poin</th>
                                    <th>Target Responden</th>
                                    <th>Target Hari</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 0;
                                @endphp
                                @foreach ( $survei as $key => $item)
                                @if (in_array($item->status, ['Belum Bayar','Sudah Bayar']))
                                <tr>
                                    <td>{{ ++$counter }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->total_pertanyaan }}</td>
                                    <td>{{ $item->poin }}</td>
                                    <td>{{ $item->jumlah_responden }}</td>
                                    <td>{{ $item->target_days }}</td>
                                    <td>
                                        @php
                                            $status = $item->status;
                                            $badgeColor = '';

                                            switch ($status) {
                                                case 'Sortir':
                                                    $badgeColor = 'bg-secondary';
                                                    break;
                                                case 'Belum Bayar':
                                                    $badgeColor = 'bg-danger';
                                                    break;
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
                                    </td>
                                    <td> 
                                        @if ($item->status == 'Sudah Bayar')
                                        <a href="{{ route('detail_sudah_bayar', ['id_survei' => $item->id_survei]) }}">
                                            <span class="badge" style="background-color: #D99004;">Validasi</span>
                                        </a>
                                        @endif
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
        <footer>
            <div class="footer clearfix mb-0 text-muted d-flex justify-content-center align-items-end">
                <div class="float-start">
                    <p>2024 &copy; Aplikasi Survey dan Analisa Data</p>
                </div>
            </div>
        </footer>
    </div>
@endsection
