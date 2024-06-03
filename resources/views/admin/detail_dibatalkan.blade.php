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
                        <h3>Dibatalkan</h3>
                        <p class="text-subtitle text-muted">Detail Survei</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dibatalkan') }}">Dibatalkan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Dibatalkan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <h4 class="card-title">Judul dan Deskripsi</h4>
                        <a href="#">
                            <span class="badge btn-danger btn-lg" style="font-size: 24px;">{{ $survei->deskripsi_validasi }}</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput"><strong>Judul : </strong></label>
                                    <p type="text">
                                        {{ $survei->judul }}
                                    </p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label"><strong>Deskripsi
                                            :</strong></label>
                                    <p type="text">
                                        {{ $survei->deskripsi }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="helpInputTop"><strong>Target Responden : </strong></label>
                                <p type="text">
                                    {{ $survei->jumlah_responden }}
                                </p>
                            </div>
                            <div class="form-group col-6">
                                <label for="helperText"><strong>Status : </strong></label>
                                
                                @php
                                    $status = $survei->status;
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
                                <p>
                                    <span class="badge {{ $badgeColor }}">{{ $status }}</span>
                                </p>
                                <p><small class="text-muted"></small>
                                </p>
                            </div>
                            <div class="form-group col-6">
                                <label for="helperText"><strong>Tanggal Mulai :</strong></label>
                                <p type="text">
                                    {{ $survei->tgl_mulai }}
                                </p>
                                <p><small class="text-muted"></small>
                                </p>
                            </div>
                            <div class="form-group col-6">
                                <label for="helperText"><strong>Tanggal Selesai : </strong></label>
                                <p type="text">
                                    {{ $survei->tgl_selesai }}
                                </p>
                                <p><small class="text-muted"></small>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
        </section>

        <div id="sections-container">
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"
                                        class="form-label"><strong>Pertanyaan</strong></label>
                                    <p type="text">
                                        Bagaimana perkuliahan hybrid menurut anda?
                                    </p>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Sangat Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Cukup Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Tidak Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Sangat Tidak Baik
                                    </label>
                                </div>
                                <div class="form-group" style="padding-top: 30px">
                                    <p type="text">
                                        Bagaimana perkuliahan hybrid menurut anda?
                                    </p>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Sangat Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Cukup Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Tidak Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Sangat Tidak Baik
                                    </label>
                                </div>
                                <div class="form-group" style="padding-top: 30px">
                                    <p type="text">
                                        Bagaimana perkuliahan hybrid menurut anda?
                                    </p>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Sangat Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Cukup Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Tidak Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                        id="flexRadioDisabled" disabled>
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Sangat Tidak Baik
                                    </label>
                                </div>
                                {{-- <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" id="basicInput" placeholder="Opsi 1">
                                        </div>
                                    </div> --}}
                            </div>

                        </div>
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
                <p>2023 &copy; Aplikasi Survey dan Analisis Data</p>
            </div>
        </div>
    </footer>
    </div>
@endsection
