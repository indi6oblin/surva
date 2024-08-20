@extends('layouts.master')

@section('menu')
    @extends('responden.sidebar.jawab_survei')
@endsection

@section('content')
<link href="landingPage/assets/img/logoapp.png" rel="icon">
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        @if ($errors->any())
            <h1>

                {{ $errors->first() }}
            </h1>
        @endif
        <!-- Toastr notifications -->
        {!! Toastr::message() !!}
        <div class="page-content">
            <div class="page-title">
                <h3>JAWAB SURVEI BISMILLAH</h3>
                <p class="text-subtitle text-muted">Jawab Survei</p>
            </div>
            <form action="{{ route('simpanjawaban', $id_survei) }}" method="POST" id="surveiForm">
                @csrf
                @foreach ($pertanyaan as $pertanyaan)
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="pertanyaan{{ $pertanyaan }}"
                                                class="form-label"><strong>Pertanyaan</strong></label>
                                            <p id="pertanyaan{{ $pertanyaan->id_pertanyaan }}">{{ $pertanyaan->pertanyaan }}
                                            </p>
                                        </div>
                                        @if ($pertanyaan->type === 'essay')
                                            <input type="hidden" name="id_pertanyaan[]"
                                                value="{{ $pertanyaan->id_pertanyaan }}">
                                            <input type="hidden" name="tipe[]" value="essay">
                                            <textarea class="form-control" name="jawaban[]" rows="3"></textarea>
                                        @else
                                            <input type="hidden" name="id_pertanyaan[]"
                                                value="{{ $pertanyaan->id_pertanyaan }}">
                                            <input type="hidden" name="tipe[]" value="opsi">
                                            <div class="form-check">
                                                <div>
                                                    <input class="form-check-input" type="radio" name="jawaban[]"
                                                        id="opsi_1" value="{{ $pertanyaan->opsi_1 }}">
                                                    <label class="form-check-label" for="opsi_1">
                                                        {{ $pertanyaan->opsi_1 }}
                                                    </label>
                                                </div>
                                                <div>
                                                    <input class="form-check-input" type="radio" name="jawaban[]"
                                                        id="opsi_2" value="{{ $pertanyaan->opsi_2 }}">
                                                    <label class="form-check-label" for="opsi_2">
                                                        {{ $pertanyaan->opsi_2 }}
                                                    </label>
                                                </div>
                                                <div>
                                                    <input class="form-check-input" type="radio" name="jawaban[]"
                                                        id="opsi_3" value="{{ $pertanyaan->opsi_3 }}">
                                                    <label class="form-check-label" for="opsi_3">
                                                        {{ $pertanyaan->opsi_3 }}
                                                    </label>
                                                </div>
                                                <div>
                                                    <input class="form-check-input" type="radio" name="jawaban[]"
                                                        id="opsi_4" value="{{ $pertanyaan->opsi_4 }}">
                                                    <label class="form-check-label" for="opsi_4">
                                                        {{ $pertanyaan->opsi_4 }}
                                                    </label>
                                                </div>
                                                <div>
                                                    <input class="form-check-input" type="radio" name="jawaban[]"
                                                        id="opsi_5" value="{{ $pertanyaan->opsi_5 }}">
                                                    <label class="form-check-label" for="opsi_5">
                                                        {{ $pertanyaan->opsi_5 }}
                                                    </label>
                                                </div>
                                                {{-- <input class="form-check-input" type="radio"
                                                name="jawaban[][hasil_opsi]"
                                                            id="opsi_5"
                                                            value="{{ [...$pertanyaan, $pertanyaan->] }}"> --}}
                                            </div>
                                        @endif
                                        {{-- <input type="hidden" name="jawaban[{{ $pertanyaan->id_pertanyaan }}][pertanyaan]" value="{{ $pertanyaan->pertanyaan }}">
                                    <input type="hidden" name="jawaban[{{ $pertanyaan->id_pertanyaan }}][id_pertanyaan]" value="{{ $pertanyaan->id_pertanyaan }}">
                                    <input type="hidden" name="jawaban[{{ $pertanyaan->id_pertanyaan }}][id_survei]" value="{{ $id_survei }}"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
                <button type="submit" class="btn btn-primary float-right" onclick="kumpulSurvei()">Kirim Jawaban</button>
            </form>
        </div>

        {{-- <form action="{{ route('simpanjawaban', $id_survei) }}" method="POST" id="surveiForm">
                @csrf
                @foreach ($pertanyaan as $index => $pertanyaanItem)
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="pertanyaan{{ $index }}" class="form-label"><strong>Pertanyaan</strong></label>
                                            <p id="pertanyaan{{ $index }}">{{ $pertanyaanItem->pertanyaan }}</p>
                                        </div>
                                        @if ($pertanyaanItem->type === 'essay')
                                            <!-- Jika soal esai, tampilkan textarea -->
                                            <textarea class="form-control" name="jawaban[{{ $index }}][hasil_essai]" rows="3"></textarea>
                                        @else
                                            <!-- Jika bukan soal esai, tampilkan pilihan opsi -->
                                            @for ($i = 1; $i <= 5; $i++)
                                                @php
                                                    $opsi = 'opsi_' . $i;
                                                @endphp
                                                @if ($pertanyaanItem->$opsi)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="jawaban[{{ $index }}][hasil_opsi]"
                                                            id="opsi{{ $i }}_{{ $index }}"
                                                            value="{{ $pertanyaanItem->$opsi }}">
                                                        <label class="form-check-label" for="opsi{{ $i }}_{{ $index }}">
                                                            {{ $pertanyaanItem->$opsi }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endfor
                                        @endif
                                        <!-- Menyimpan ID pertanyaan dan ID responden di form -->
                                        <input type="hidden" name="jawaban[{{ $index }}][id_pertanyaan]" value="{{ $pertanyaanItem->id }}">
                                        <input type="hidden" name="jawaban[{{ $index }}][id_survei]" value="{{ $id_survei }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
                <button type="submit" class="btn btn-primary float-right" onclick="submitForm(e)">Kirim Jawaban</button>
            </form> --}}
    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted d-flex justify-content-center align-items-end">
            <div class="float-start">
                <p>2024 &copy; Aplikasi Survey dan Analisis Data</p>
            </div>
        </div>
    </footer>
@endsection

<script>
    function kumpulSurvei() {
        // Menampilkan konfirmasi
        var konfirmasi = confirm('Apakah anda yakin ingin kumpul jawaban?');

        // Memeriksa apakah pengguna menyetujui atau membatalkan
        if (konfirmasi) {
            document.getElementById('surveiForm').submit();
        } else {
            // Jika dibatalkan, tampilkan pesan atau lakukan tindakan lain
            alert('Anda batal kumpul jawaban.');
            // Hindari pengiriman formulir dengan menghentikan peristiwa default
            event.preventDefault(); // Anda mungkin perlu memasukkan parameter event ke fungsi Anda
        }
    }
</script>
