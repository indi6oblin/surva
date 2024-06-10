<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="{{ route('home_admin') }}">Beranda</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item">
                    <a href="{{ route('home_admin') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Halaman Utama</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub active">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-text-fill"></i>
                        <span>Survei</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="{{ route('sortir_admin') }}">
                                <i class="bi bi-sort-down"></i>Daftar Survei
                            </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('sudah_bayar') }}">
                                <i class="bi bi-wallet2"></i> Validasi Bayar
                            </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('disetujui') }}">
                                <i class="bi bi-card-checklist"></i> Disetujui
                            </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('dibatalkan') }}">
                                <i class="bi bi-trash"></i> Dibatalkan
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('kelola_klien') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Klien</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('kelola_responden') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Responden</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('kelola_responden') }}" class='sidebar-link'>
                    <i class="bi bi-envelope"></i>
                        <span>Paket pertanyaan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <div class="card-body">
                        <div class="badges">
                            @if (auth()->user())
                                <span>Username: <span
                                        class="fw-bolder">{{ auth('admin')->user()->username }}</span></span>
                            @endif
                            <hr>
                            <span>Sebagai:</span>
                            <span class="badge bg-success">Admin</span>
                        </div>
                    </div>
                </li>

                {{-- <li class="sidebar-item">
                    <a href="{{ route('change/password') }}" class='sidebar-link'>
                        <i class="bi bi-shield-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li> --}}

                <li class="sidebar-item  has-sub visually-hidden">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Halaman Pengguna</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('userManagement') }}">Daftar Pengguna</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('logout_admin') }}" class='sidebar-link' onclick="confirmSubmission()">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
    <script>
        function confirmSubmission() {
            // Menampilkan konfirmasi
            var konfirmasi = confirm('Apakah Anda yakin ingin keluar?');

            // Memeriksa apakah pengguna menyetujui atau membatalkan
            if (konfirmasi) {
                document.getElementById('buktiForm').submit();
            } else {
                // Jika dibatalkan, tampilkan pesan atau lakukan tindakan lain
                alert('Anda batal keluar.');
                // Hindari pengiriman formulir dengan menghentikan peristiwa default
                event.preventDefault(); // Anda mungkin perlu memasukkan parameter event ke fungsi Anda
            }
        }
    </script>
</div>
