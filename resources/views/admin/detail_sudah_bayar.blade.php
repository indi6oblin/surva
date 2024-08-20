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
                        <h3>Validasi Pembayaran</h3>
                        <p class="text-subtitle text-muted">Validasi Pembayaran Survei</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('sudah_bayar') }}">Validasi Bayar</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Validasi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Judul dan Deskripsi</h4>
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
                            <div class="form-group">
                                <label for="helpInputTop"><strong>Target Responden : </strong></label>
                                <p type="text">
                                    {{ $survei->jumlah_responden }}
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
                    <div class="card-header">
                        <h4 class="card-title">Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput"><strong>Total Pembayaran : </strong></label>
                                    <p type="text">
                                        {{ $survei->nominal }}
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput"><strong>Rincian Pembayaran : </strong></label>
                                    <p class="card-text">{{ $survei->rincian_harga }}
                                    </p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label"><strong>Bukti Bayar
                                            :</strong></label>
                                    <div class="col-3 col-lg-3" style="height: 60px;">
                                        <div class="card text-center">
                                            <button class="btn btn-lg font-semibold" data-bs-toggle="modal"
                                                data-bs-target="#modalBayar"
                                                style="background-color: #D99004; color: white;">
                                                Cek Bukti Pembayaran
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Modal cek bukti bayar -->
                    <div class="modal fade text-left" id="modalBayar" tabindex="-1" aria-labelledby="modalBayarLabel"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalBayarLabel">Bukti pembayaran</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <label class="form-check-label">
                                            @if ($survei->bukti)
                                                <img src="{{ asset('storage/' . $survei->bukti) }}" alt="Bukti Pembayaran">
                                            @else
                                                {{-- <img src="{{ route('bukti_pembayaran', ['id_survei' => $survei->id_survei]) }}" alt="Bukti Pembayaran"> --}}
                                                Bukti pembayaran belum tersedia
                                            @endif
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-2 col-lg-2" style="height: 100px;">
                        <div class="card text-center">
                            <button class="btn btn-success btn-lg font-semibold" data-bs-toggle="modal"
                                data-bs-target="#modalSetuju">
                                Terima
                            </button>
                        </div>

                        <!-- Modal Setuju -->
                        <div class="modal fade text-left" id="modalSetuju" tabindex="-1"
                            aria-labelledby="modalSetujuLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalSetujuLabel">Validasi Pembayaran</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <label class="form-check-label">
                                                Apakah Anda yakin telah menerima pembayaran ini?
                                            </label>
                                        </div>
                                    </div>
                                    <form action="{{ route('terima_bayar', $survei->id_survei) }}" method="post"
                                        id="paidForm">
                                        @csrf
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-success">Ya</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-2 col-lg-2" style="height: 100px;">
                        <div class="card text-center">
                            <button class="btn btn-danger btn-lg font-semibold" data-bs-toggle="modal"
                                data-bs-target="#modalTidak">
                                Tolak
                            </button>
                        </div>

                        <!-- Modal Tidak -->
                        <div class="modal fade text-left" id="modalTidak" tabindex="-1"
                            aria-labelledby="modalTidakLabel" style="display: none;" aria-hidden="true">
                            <form action="{{ route('tolak_bayar', $survei->id_survei) }}" method="post"
                                id="unpaidForm">
                                @csrf
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTidakLabel">Alasan Bukti Pembayaran Ditolak
                                            </h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-check">
                                                <div class="input-group">
                                                    <textarea class="form-control" id="deskripsi_validasi" name="deskripsi_validasi" rows="5"
                                                        placeholder="Berikan Alasannya Disini" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Tutup
                                            </button>
                                            <button type="button" class="btn btn-danger"
                                                onclick="tolakBayar()">Tolak</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Modal Setuju -->
                            <div class="modal fade text-left" id="modalSetuju" tabindex="-1"
                                aria-labelledby="modalSetujuLabel" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalSetujuLabel">Setuju</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <label class="form-check-label">
                                                    Yakin menyetujui survei?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="button" class="btn btn-success"
                                                onclick="handleSetuju()">Setuju</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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

        <script>
            function tolakBayar() {
                // Menampilkan konfirmasi
                var konfirmasi = confirm('Apakah Anda yakin ingin menolak bukti pembayaran ini?');

                // Memeriksa apakah pengguna menyetujui atau membatalkan
                if (konfirmasi) {
                    alert('Anda telah menolak bukti pembayaran.');
                    // Jika disetujui, kirim formulir
                    document.getElementById('unpaidForm').submit();
                } else {
                    // Jika dibatalkan, tampilkan pesan atau lakukan tindakan lain
                    alert('Anda telah membatalkan penolakan bukti pembayaran.');
                    // Hindari pengiriman formulir dengan menghentikan peristiwa default
                    event.preventDefault(); // Anda mungkin perlu memasukkan parameter event ke fungsi Anda
                }
            }
        </script>

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
