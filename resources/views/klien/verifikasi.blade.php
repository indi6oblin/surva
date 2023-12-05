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
        
        {{-- <div class="page-heading">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <h3>Selamat Datang</h3>
                </div>
                <div class="col-12 col-lg-3 mr-auto">
                    <div class="card" data-bs-toggle="modal" data-bs-target="#default">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="{{ URL::to('/') }}/images/photo_defaults.jpg" alt="photo">
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">
                                        @if (auth()->user())
                                            {{ auth()->user()->nama }}
                                        @endif
                                    </h5>
                                    <h6 class="text-muted mb-0">
                                        @if (auth()->user())
                                            {{ auth()->user()->email }}
                                        @endif
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- user profile modal --}}
                    {{-- <div class="card-body">
                        <!--Basic Modal -->
                        <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1"
                            style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">User Profile</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-body">

                                            <div class="row">
                                                @if (auth()->user())
                                                    <div class="col-md-4">
                                                        <label>Full Name</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" name="fullName"
                                                                    value="{{ auth()->user()->nama }}" readonly>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else(auth()->user())
                                                    <div class="col-md-4">
                                                        <label>Username</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" name="username"
                                                                    value="{{ auth('admin')->user()->username }}" readonly>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-md-4">
                                                    <label>Email Address</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" name="email"
                                                                value="{{ auth()->user() ? auth()->user()->email : auth('admin')->user()->email }}"
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
                                                                value="{{ auth()->user() ? 'Klien' : 'Admin' }}" readonly>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-exclude"></i>
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
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- end user profile modal --}}

                {{-- </div>
            </section>
        </div> --}}
        {{-- message --}}

        

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
                                    <th style="max-width: 160px;">Bukti</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $kliensurvei as $key => $survei)
                                @if (in_array($survei->status, ['Sudah Bayar', 'Disetujui', 'Ditolak']))

                                {{-- <tr>
                                    <td>1</td>
                                    <td>Pergaulan Remaja</td>
                                    <td>12</td>
                                    <td>25</td>
                                    <td>
                                        <span class="badge bg-success">Diterima</span>
                                    </td>
                                </tr>--}}
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $survei->judul }}</td>
                                    <td>{{ $survei->nominal }}</td>
                                    <td style="max-width: 160px; overflow: hidden; text-overflow: ellipsis;">{{ $survei->deskripsi_bayar }}</td>
                                    <td style="max-width: 160px; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $survei->bukti }}
                                    </td>
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
