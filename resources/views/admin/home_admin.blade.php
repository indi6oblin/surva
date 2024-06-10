@extends('layouts.master')
@section('menu')
    @extends('admin.sidebar.dashboard_admin')
@endsection
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <section class="row">
                <div class="col-lg-8" style="height: 100px;">
                    <h3>Selamat Datang, {{ auth('admin')->user()->username }}</h3>
                </div>
                <div class="col-5 col-lg-4" style="height: 100px;">
                    <div class="card" data-bs-toggle="modal" data-bs-target="#default">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="{{ URL::to('/') }}/images/photo_defaults.jpg" alt="photo">
                                </div>
                                <div class="ms-4 name">
                                    <h5 class="font-bold">
                                        @if (auth()->user())
                                            {{ auth()->user()->nama }}
                                        @else
                                            {{ auth('admin')->user()->username }}
                                        @endif
                                    </h5>
                                    <h6 class="text-muted mb-0">
                                        @if (auth()->user())
                                            {{ auth()->user()->email }}
                                        @else
                                            {{ auth('admin')->user()->email }}
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
                                        <h5 class="modal-title" id="myModalLabel1">Profil Admin</h5>
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
                                                        <label>Nama Admin</label>
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
                                                    <label>Alamat Email</label>
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
                                                    <label>Masuk Sebagai</label>
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

        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Total Responden</h6>
                                            <h6 class="font-extrabold mb-0">
                                                {{ $responden }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (auth('admin')->user())
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total Klien</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    {{ $klien }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                                            <div class="stats-icon green"
                                                style="padding-bottom: 10px; padding-right: 10px;">
                                                <i class="bi bi-file-text-fill"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Total Survei</h6>
                                            <h6 class="font-extrabold mb-0">
                                                {{ $survei_count }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
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
                                    <th>Nama Survei</th>
                                    <th>Jumlah Pertanyaan</th>
                                    <th>Jumlah Poin</th>
                                    <th>Target Responden</th>
                                    <th>Target hari</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $survei as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
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
                                        <a href="{{ route('detail_survei_home', ['id_survei' => $item->id_survei]) }}">
                                            <span class="badge" style="background-color: #D99004;">Detail</span>
                                        </a>
                                    </td>
                                </tr>
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
