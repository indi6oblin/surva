@extends('layouts.master')

@section('menu')
    @extends('klien.sidebar.profil')
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
        {{-- START FORM --}}
            <div class="page-content">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Profil</h3>
                            <p class="text-subtitle text-muted">Edit Profil Anda</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <form action="{{ route('simpan_datadiri', ['id_klien' => $klien->id_klien]) }}" method="post">
                    @csrf
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Diri Anda</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id_klien" value="{{ auth()->user()->id_klien }}" id="id_klien">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            placeholder=" " value="{{ old('nama', $klien->nama ?? '') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username"
                                            placeholder=" " value="{{ old('username', $klien->username ?? '') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" id="email"
                                            placeholder=" " value="{{ old('email', $klien->email ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span></span>
                            <button type="submit" class="btn btn-light-primary" onclick="profilConfirm()">Simpan Data Diri</button>
                        </div>
                        </form>

                    </div>
                </section>


                <form action="{{ route('simpan_pass_klien', ['id_klien' => $klien->id_klien]) }}" method="post" id="editForm">
                    @csrf
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Password</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id_klien" value="{{ auth()->user()->id_klien }}" id="id_klien">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Password Lama</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Masukkan Password Lama Anda">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="password">Password Baru</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Masukkan Password Baru Anda">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span></span>
                            <button class="btn btn-light-primary">Simpan Password</button>
                        </div>
                        </form>
                    </div>
                </section>

            </div>
            <script>
                function profilConfirm() {
                    // Menampilkan konfirmasi
                    var konfirmasi = confirm('Apakah Anda yakin ingin menyimpan perubahan data diri?');

                    // Memeriksa apakah pengguna menyetujui atau membatalkan
                    if (konfirmasi) {
                        // Jika disetujui, kirim formulir
                        alert('Data diri Anda berhasil diperbarui.');
                        document.getElementById('hapusForm').submit();
                    } else {
                        // Jika dibatalkan, tampilkan pesan atau lakukan tindakan lain
                        alert('Pembaruan data diri Anda dibatalkan.');
                        // Hindari pengiriman formulir dengan menghentikan peristiwa default
                        event.preventDefault(); // Anda mungkin perlu memasukkan parameter event ke fungsi Anda
                    }
                }
            </script>

            {{-- <input type="hidden" name="pertanyaanArray" id="pertanyaanArrayInput" value=""> --}}
            <div class="col-md-12 text-center">
            </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted d-flex justify-content-center align-items-end">
                <div class="float-start">
                    <p>2024 &copy; Aplikasi Survey dan Analisis Data</p>
                </div>
            </div>
        </footer>
    </div>
    </form>
    {{-- END FORM --}}
@endsection
