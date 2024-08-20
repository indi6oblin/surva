@extends('layouts.master')
@section('menu')
    @extends('responden.sidebar.dashboard_responden')
@endsection
@section('content')
<link href="landingPage/assets/img/logoapp.png" rel="icon">
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <section class="row">
                <div class="col-lg-8">
                    <h3>Selamat Datang, {{ auth('responden')->user()->nama }}</h3>
                </div>
                <div class="col-5 col-lg-4 mr-auto">
                    <div class="card" data-bs-toggle="modal" data-bs-target="#default">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="{{ URL::to('/') }}/images/photo_defaults.jpg" alt="photo">
                                </div>
                                <div class="ms-4 name">
                                    <h5 class="font-bold">
                                        @if (auth('responden')->user())
                                            {{ auth('responden')->user()->nama }}
                                        @endif
                                    </h5>
                                    <h6 class="text-muted mb-0">
                                        @if (auth('responden')->user())
                                            {{ auth('responden')->user()->email }}
                                        @endif
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- user profile modal --}}
                    <div class="card-body">
                        <!--Basic Modal -->
                        <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1"
                            style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">Profil Pengguna</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-body">

                                            <div class="row">
                                                @if (auth('responden')->user())
                                                    <div class="col-md-4">
                                                        <label>Nama Lengkap</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" name="fullName"
                                                                    value="{{ auth('responden')->user()->nama }}" readonly>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else(auth('responden')->user())
                                                    <div class="col-md-4">
                                                        <label>Nama Pengguna</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" name="username"
                                                                    value="{{ auth('responden')->user()->nama }}" readonly>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-md-4">
                                                    <label>Alamat Email</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" name="email"
                                                                value="{{ auth('responden')->user() ? auth('responden')->user()->email : auth('admin')->user()->email }}"
                                                                readonly>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-envelope"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Login Sebagai</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control"
                                                                value="Responden" readonly>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-exclude"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Jumlah Poin</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control"
                                                                value="{{ auth('responden')->user()->poin }}" readonly>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-calendar2-check-fill"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Tutup</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end user profile modal --}}

                </div>
            </section>
        {{-- message --}}
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
                                    <th>Judul Survei</th>
                                    <th style="max-width: 450px;">Deskripsi</th>
                                    <th>Tenggat Pengisian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $kliensurvei as $key => $survei)
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
