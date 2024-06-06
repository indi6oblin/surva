<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="{{ route('home_klien') }}">Home</a>
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
                    <a href="{{ route('home_klien') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub active">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-text-fill"></i>
                        <span>Survei</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('buat_survei') }}">
                                <i class="bi bi-plus-circle-fill"></i> Buat Survei
                            </a>
                        </li>
                        </li>
                        <li class="submenu-item active">
                            <a href="{{ route('detail_survei') }}">
                                <i class="bi bi-menu-button-wide-fill"></i> Detail Survei
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('daftar_pembayaran') }}" class='sidebar-link'>
                        <i class="bi bi-credit-card-fill"></i>
                        <span>Pembayaran</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('verifikasi') }}" class='sidebar-link'>
                        <i class="bi bi-patch-check-fill"></i>
                        <span>Verifikasi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('editprofil') }}" class='sidebar-link'>
                        <i class="bi bi-person-circle"></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <div class="card-body">
                        <div class="badges">
                            @if(auth()->user())
                            <span>Nama: <span class="fw-bolder">{{ auth()->user()->nama }}</span></span>
                            @endif
                            <hr>
                            <span>Sebagai:</span>
                            <span class="badge bg-success">Klien</span>
                            
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
                    <a href="{{ route('logout') }}" class='sidebar-link' onclick="confirmSubmission()">
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