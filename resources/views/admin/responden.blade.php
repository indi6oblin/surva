@extends('layouts.master')
@section('menu')
    @extends('admin.sidebar.responden')
@endsection
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-content">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Kelola Responden</h3>
                        <p class="text-subtitle text-muted">Kelola Pengguna Aplikasi : <strong>Responden</strong></p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('sortir_admin') }}">Sortir</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Sortir</li>
                            </ol>
                        </nav>
                    </div>
                </div>
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
                                                {{ $responden_count }}
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
                        <strong>Daftar Akun Responden</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Alamat Email</th>
                                    <th>Total Poin</th>
                                    {{-- <th>Survei Terjawab</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $responden as $key => $item)
                                <tr>
                                    <td><i class="bi bi-person-fill"></i></td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->poin }}</td>
                                    {{-- <td></td> --}}
                                    <td>
                                        <form action="{{ route('hapus_responden', ['id_responden' => $item->id_responden]) }}" method="POST" onclick="confirmSubmission()" id="hapusForm">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge" style="background-color: #f3616d;" >
                                                <i class="bi bi-trash-fill"></i> Hapus
                                            </button>
                                        </form>
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
            <script>
                function confirmSubmission() {
                    // Menampilkan konfirmasi
                    var konfirmasi = confirm('Apakah Anda yakin ingin menghapus akun responden ini?');

                    // Memeriksa apakah pengguna menyetujui atau membatalkan
                    if (konfirmasi) {
                        // Jika disetujui, kirim formulir
                        alert('Akun responden berhasil dihapus.');
                        document.getElementById('hapusForm').submit();
                    } else {
                        // Jika dibatalkan, tampilkan pesan atau lakukan tindakan lain
                        alert('Menghapus akun responden telah dibatalkan.');
                        // Hindari pengiriman formulir dengan menghentikan peristiwa default
                        event.preventDefault(); // Anda mungkin perlu memasukkan parameter event ke fungsi Anda
                    }
                }
            </script>
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
