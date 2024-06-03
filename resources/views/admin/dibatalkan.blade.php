@extends('layouts.master')
@section('menu')
    @extends('admin.sidebar.dibatalkan')
@endsection
@section('content')
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
                        <h3>Survei Ditolak</h3>
                        <p class="text-subtitle text-muted">Daftar Survei Ditolak</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Survei</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ditolak</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
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
                                    <th>Jumlah Pertanyaan</th>
                                    <th style="max-width: 160px;">Alasan Dibatalkan</th>
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
                                @if ($item->status == 'Ditolak')
                                <tr>
                                    <td>{{ ++$counter }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->total_pertanyaan }}</td>
                                    <td style="max-width: 160px; overflow: hidden; text-overflow: ellipsis;">{{ $item->deskripsi_validasi }}</td>
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
                                        <a href="{{ route('detail_dibatalkan', ['id_survei' => $item->id_survei]) }}">
                                            <span class="badge" style="background-color: #D99004;">Detail</span>
                                        </a>
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
                    <p>2023 &copy; Aplikasi Survey dan Analisa Data</p>
                </div>
            </div>
        </footer>
    </div>
@endsection
