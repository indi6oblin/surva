@extends('layouts.master')
@section('menu')
    @extends('admin.sidebar.sortir_admin')
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
                        <h3>Sortir Survei</h3>
                        <p class="text-subtitle text-muted">Detail Sortir Survei</p>
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
                            <div class="form-group col-6">
                                <label for="helperText"><strong>Target Hari : </strong></label>
                                <p type="text">
                                    {{ $survei->tgl_mulai }}
                                </p>
                                <p><small class="text-muted"></small>
                                </p>
                            </div>
                            <div class="form-group col-6">
                                <label for="helperText"><strong>Jumlah Pertanyaan : </strong></label>
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
            @foreach ($pertanyaan as $index => $pertanyaanItem)
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"
                                            class="form-label"><strong>Pertanyaan</strong></label>
                                        <p type="text">{{ $pertanyaanItem->pertanyaan }}</p>
                                    </div>
                                    @if ($pertanyaanItem->type === 'essay')
                                        <!-- Jika soal esai, tampilkan jawaban -->
                                        <p type="text">{{ $pertanyaanItem->jawaban }}</p>
                                    @else
                                        <!-- Jika bukan soal esai, tampilkan pilihan opsi -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="flexRadioDisabled{{ $index }}"
                                                id="flexRadioDisabled1{{ $index }}" disabled>
                                            <label class="form-check-label" for="flexRadioDisabled1{{ $index }}">
                                                {{ $pertanyaanItem->opsi_1 }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="flexRadioDisabled{{ $index }}"
                                                id="flexRadioDisabled2{{ $index }}" disabled>
                                            <label class="form-check-label" for="flexRadioDisabled2{{ $index }}">
                                                {{ $pertanyaanItem->opsi_2 }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="flexRadioDisabled{{ $index }}"
                                                id="flexRadioDisabled3{{ $index }}" disabled>
                                            <label class="form-check-label" for="flexRadioDisabled3{{ $index }}">
                                                {{ $pertanyaanItem->opsi_3 }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="flexRadioDisabled{{ $index }}"
                                                id="flexRadioDisabled4{{ $index }}" disabled>
                                            <label class="form-check-label" for="flexRadioDisabled4{{ $index }}">
                                                {{ $pertanyaanItem->opsi_4 }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="flexRadioDisabled{{ $index }}"
                                                id="flexRadioDisabled5{{ $index }}" disabled>
                                            <label class="form-check-label" for="flexRadioDisabled5{{ $index }}">
                                                {{ $pertanyaanItem->opsi_5 }}
                                            </label>
                                        </div>
                                    @endif
                                    {{-- <div id="myChart{{ $index }}"
                                        style="width:100%; max-width:600px; height:350px;"></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach

            <div class="row">
                <div class="col-2 col-lg-2" style="height: 100px;">
                    <div class="card text-center">
                        <button class="btn btn-success btn-lg font-semibold" data-bs-toggle="modal"
                            data-bs-target="#modalSetuju">
                            Setuju
                        </button>
                    </div>

                    <!-- Modal Setuju -->
                    <div class="modal fade text-left" id="modalSetuju" tabindex="-1" aria-labelledby="modalSetujuLabel"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <form action="{{ route('setuju', $survei->id_survei) }}" method="post" id="setujuForm">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalSetujuLabel">Pembayaran</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form di dalam modal -->
                                        <div class="mb-3">
                                            <label for="nominal" class="form-label">Total Harga</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="number" class="form-control" name="nominal"
                                                    placeholder="Masukkan Harga Survei" required>
                                            </div>
                                            {{-- @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                        </div>

                                        <div class="mb-3">
                                            <label for="rincian_harga" class="form-label">Rincian Harga</label>
                                            <div class="input-group">
                                                <textarea class="form-control form-control" id="rincian_harga" name="rincian_harga" rows="5"
                                                    placeholder="Masukkan detail harga di sini..." required></textarea>
                                            </div>
                                            {{-- @error('rincian_harga')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                        </div>
                                        <!-- Dropdown di dalam modal -->
                                        <div class="mb-3">
                                            <label for="poin" class="form-label">Jumlah Poin</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="poin" name="poin"
                                                    placeholder="Masukkan Jumlah Poin" required>
                                            </div>
                                            {{-- @error('poin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success ml-auto" onclick="confirmSetuju()">
                                            {{-- <a href="{{ route('setuju', $survei->id_survei) }}" class="btn btn-success ml-auto">
                                            Setuju
                                        </a> --}}
                                            Setuju
                                        </button>
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

                    <!-- Modal Tolak -->
                    <div class="modal fade text-left" id="modalTidak" tabindex="-1" aria-labelledby="modalTidakLabel"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <form action="{{ route('tolak', $survei->id_survei) }}" method="post" id="tolakForm">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTidakLabel">Alasan Pembatalan</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            {{-- <label for="exampleFormControlInput1" class="form-label">Berikan Alasan</label> --}}
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
                                        <button type="submit" class="btn btn-danger"
                                            onclick="confirmTolak()">Tolak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                    <p>2024 &copy; Aplikasi Survey dan Analisis Data</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function confirmSetuju() {
            // Menampilkan konfirmasi
            var konfirmasi = confirm('Apakah Anda yakin ingin menyetujui survei ini?');

            // Memeriksa apakah pengguna menyetujui atau membatalkan
            if (konfirmasi) {
                alert('Survei telah disetujui.');
                // Jika disetujui, kirim formulir
                document.getElementById('setujuForm').submit();
            } else {
                // Jika dibatalkan, tampilkan pesan atau lakukan tindakan lain
                alert('Anda telah membatalkan penyetujuan.');
                // Hindari pengiriman formulir dengan menghentikan peristiwa default
                event.preventDefault(); // Anda mungkin perlu memasukkan parameter event ke fungsi Anda
            }
        }

        function confirmTolak() {
            // Menampilkan konfirmasi
            var konfirmasi = confirm('Apakah Anda yakin ingin menolak survei ini?');

            // Memeriksa apakah pengguna menyetujui atau membatalkan
            if (konfirmasi) {
                alert('Survei telah ditolak.');
                // Jika disetujui, kirim formulir
                document.getElementById('tolakForm').submit();
            } else {
                // Jika dibatalkan, tampilkan pesan atau lakukan tindakan lain
                alert('Anda telah membatalkan penyetujuan.');
                // Hindari pengiriman formulir dengan menghentikan peristiwa default
                event.preventDefault(); // Anda mungkin perlu memasukkan parameter event ke fungsi Anda
            }
        }
    </script>
@endsection
