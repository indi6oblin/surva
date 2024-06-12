@extends('layouts.master')

@section('menu')
    @extends('klien.sidebar.profil')
@endsection

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

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


                <form action="{{ route('simpan_survei') }}" method="post" id="editForm">
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
                    <p>2023 &copy; Aplikasi Survey dan Analisis Data</p>
                </div>
            </div>
        </footer>
    </div>
    </form>
    {{-- END FORM --}}
@endsection
