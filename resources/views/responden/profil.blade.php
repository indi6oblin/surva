@extends('layouts.master')
@section('menu')
    @extends('responden.sidebar.profil')
@endsection


@section('content')
<link href="landingPage/assets/img/logoapp.png" rel="icon">
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

            @if(isset($responden) && $responden)
                <!-- Form untuk edit data diri -->
                <form action="{{ route('simpan_datadiri_responden', ['id_responden' => $responden->id_responden]) }}" method="post">
                <form action="/" method="post">
                    @csrf
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Diri Anda</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id_responden" value="{{ $responden->id_responden }}" id="id_responden">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="nama" placeholder=" " value="{{ old('nama', $responden->nama ?? '') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" class="form-control" id="username" placeholder=" " value="{{ old('username', $responden->username ?? '') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" id="email" placeholder=" " value="{{ old('email', $responden->email ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <span></span>
                                <button type="submit" class="btn btn-light-primary" onclick="profilConfirm()">Simpan Data Diri</button>
                            </div>
                        </div>
                    </section>
                </form>

                <!-- Form untuk ganti password -->
                <form action="{{ route('simpan_pass_responden', ['id_responden' => $responden->id_responden]) }}" method="post">
                <!-- Form untuk ganti password -->
                <form action="/" method="post">
                @csrf
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Password</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id_responden" value="{{ $responden->id_responden }}" id="id_responden">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password_lama">Password Lama</label>
                                            <input type="password" name="password_lama" class="form-control" id="password_lama" placeholder="Masukkan Password Lama Anda">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="password_baru">Password Baru</label>
                                            <input type="password" name="password_baru" class="form-control" id="password_baru" placeholder="Masukkan Password Baru Anda">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_baru_confirmation">Konfirmasi Password Baru</label>
                                            <input type="password" name="password_baru_confirmation" class="form-control" id="password_baru_confirmation" placeholder="Konfirmasi Password Baru Anda">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <span></span>
                                <button type="submit" class="btn btn-light-primary">Simpan Password</button>
                            </div>
                        </div>
                    </section>
                </form>
            @else
                <p>ID Responden tidak tersedia.</p>
            @endif
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted d-flex justify-content-center align-items-end">
                <div class="float-start">
                    <p>2024 &copy; Aplikasi Survey dan Analisis Data</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function profilConfirm() {
            var konfirmasi = confirm('Apakah Anda yakin ingin menyimpan perubahan data diri?');
            if (konfirmasi) {
                alert('Data diri Anda berhasil diperbarui.');
                document.getElementById('editForm').submit();
            } else {
                alert('Pembaruan data diri Anda dibatalkan.');
                event.preventDefault();
            }
        }
    </script>
@endsection
