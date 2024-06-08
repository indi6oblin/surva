<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SURVA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="landingPage/assets/img/logoapp.png" rel="icon">
    <link href="landingPage/assets/img/logoapp.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="landingPage/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="landingPage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="landingPage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="landingPage/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="landingPage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="landingPage/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: SoftLand
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1><a href="index.html">SURVA</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="active " href="#">Beranda</a></li>
                    <li><a href="#main">Tentang</a></li>

                    <li class="dropdown"><a href="#"><span>Autentikasi</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('login_admin') }}">Admin</a></li>
                            <li><a href="{{ route('login') }}">Klien</a></li>
                            <li><a href="{{ route('login_responden') }}">Responden</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section class="hero-section" id="hero">

        <div class="wave">

            <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                        <path
                            d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
                            id="Path"></path>
                    </g>
                </g>
            </svg>

        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 hero-text-image">
                    <div class="row">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 data-aos="fade-right">"Sempurnakan penelitian Anda dengan aplikasi survei kami."</h1>
                            <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a
                                    href="{{ route('register') }}" class="btn btn-outline-white">Daftar Sekarang</a></p>
                        </div>
                        <div class="col-lg-4 iphone-wrap">
                            <img src="/landingPage/assets/img/home-responden.png" alt="Image" class="phone-1"
                                data-aos="fade-right">
                            <img src="/landingPage/assets/img/login-responden.png" alt="Image" class="phone-2"
                                data-aos="fade-right" data-aos-delay="200">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Home Section ======= -->
        <section class="section">
            <div class="container">

                <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-5" data-aos="fade-up">
                        <h2 class="section-heading">Apa yang disediakan oleh Surva?</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="">
                        <div class="feature-1 text-center">
                            <div class="wrap-icon icon-1">
                                <i class="bi bi-journal-arrow-up"></i>
                            </div>
                            <h3 class="mb-3">Pengajuan survei</h3>
                            <p>Klien pada aplikasi Surva dapat mengajukan survei mereka</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-1 text-center">
                            <div class="wrap-icon icon-1">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <h3 class="mb-3">Analisa hasil survei</h3>
                            <p>Klien akan mendapat analisa hasil survei yang sudah disetujui</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-1 text-center">
                            <div class="wrap-icon icon-1">
                                <i class="bi bi-trophy"></i>
                            </div>
                            <h3 class="mb-3">Hadiah mengisi survei</h3>
                            <p>Responden yang mengisi survei akan mendapatkan hadiah</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">

            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-5" data-aos="fade-up">
                        <h2 class="section-heading">Bagaimana cara menggunakan surva?</h2>
                    </div>
                </div>
                <div class="row justify-content-center text-center mb-5" data-aos="fade">
                    <div class="col-md-6 mb-5">
                        <img src="landingPage/assets/img/undraw_svg_1.svg" alt="Image" class="img-fluid">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="step">
                            <span class="number">01</span>
                            <h3>Daftar</h3>
                            <p>Pengguna dapat mendaftar pada aplikasi Surva sebagai Klien dan Responden</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="step">
                            <span class="number">02</span>
                            <h3>Masuk sebagai pengguna</h3>
                            <p>Setelah mendaftar, lakukan autentikasi untuk masuk ke sistem</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="step">
                            <span class="number">03</span>
                            <h3>Nikmati aplikasi Surva</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- ======= Testimonials Section ======= -->


        <!-- ======= CTA Section ======= -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="footer" role="contentinfo">
        <div class="container">

            <div class="row justify-content-center text-center">
                <div class="col-md-7">
                    <p class="copyright">&copy; Copyright SoftLand. All Rights Reserved</p>
                    <div class="credits">
                        <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=SoftLand
          -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </div>

        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="landingPage/assets/vendor/aos/aos.js"></script>
    <script src="landingPage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="landingPage/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="landingPage/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="landingPage/assets/js/main.js"></script>

</body>

</html>
