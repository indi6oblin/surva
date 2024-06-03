@extends('layouts.master')
@section('menu')
    @extends('admin.sidebar.sortir_admin')
@endsection
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-muted font-semibold">Kendaraan</h5>
                                            <h6 class="text-muted font-semibold">3 Pertanyaan</h6>
                                            <h6 class="font-extrabold mb-0">
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-sm col-3"
                                    style="border-radius: 0 15px 0 15px;">0
                                    POIN</a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-muted font-semibold">Kendaraan</h5>
                                            <h6 class="text-muted font-semibold">3 Pertanyaan</h6>
                                            <h6 class="font-extrabold mb-0">
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-sm col-3"
                                    style="border-radius: 0 15px 0 15px;">0
                                    POIN</a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-muted font-semibold">Kendaraan</h5>
                                            <h6 class="text-muted font-semibold">3 Pertanyaan</h6>
                                            <h6 class="font-extrabold mb-0">
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-sm col-3"
                                    style="border-radius: 0 15px 0 15px;">0
                                    POIN</a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-muted font-semibold">Kendaraan</h5>
                                            <h6 class="text-muted font-semibold">3 Pertanyaan</h6>
                                            <h6 class="font-extrabold mb-0">
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-sm col-3"
                                    style="border-radius: 0 15px 0 15px;">0
                                    POIN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
