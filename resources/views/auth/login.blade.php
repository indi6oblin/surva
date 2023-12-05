@extends('layouts.app')
@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    {{-- message --}}
                    {!! Toastr::message() !!}
                    <h1 class="auth-title">APSIS</h1>
                    @if (session()->has('error'))
                        <div class="text-danger text-center text-bold">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <br>
                    {{-- <h6 class="">Masuk sebagai : <strong>Klien</strong></h6> --}}
                    <p class="auth-subtitle mb-3">Masuk sebagai : <strong>Klien</strong></p>
                    {{-- @isset($route)
                        <form method="POST" action="{{ $route }}" class="md-float-material">
                        @else --}}
                            <form method="POST" action="{{ route('login') }}" class="md-float-material">
                            {{-- @endisset --}}
                            @csrf
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text"
                                    class="form-control form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" placeholder="Masukkan Username">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password"
                                    class="form-control form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Masukkan Password">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group position-relative has-icon-left mb-4">
                                <div class="d-flex flex-column">
                                    <span class="mb-2">Login sebagai:</span>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" value="klien"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Klien
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" value="admin"
                                            id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Admin
                                        </label>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="form-check form-check-lg d-flex align-items-end">
                                <input class="form-check-input me-2" type="checkbox" value="remember_me" id="remember_me"
                                    name="remember_me">
                                <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                    Ingatkan Saya
                                </label>
                            </div>
                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2" type="submit">Masuk</button>
                        </form>
                        <div class="text-center mt-5 text-lg fs-5">
                            <p class="text-gray-600">Belum Punya Akun <a href="{{ route('register') }}"
                                    class="font-bold">Daftar</a>.</p>
                            <p class="text-gray-600"><a href="{{ route('landing.index') }}"
                                    class="font-bold"><i class="bi bi-house"></i>  Kembali ke Beranda</a>.</p>
                        </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>
@endsection
