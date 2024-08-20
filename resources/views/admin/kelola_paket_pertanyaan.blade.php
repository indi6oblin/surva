@extends('layouts.master')

@section('menu')
    @include('admin.sidebar.paket_pertanyaan')
@endsection

@section('content')

<link href="landingPage/assets/img/logoapp.png" rel="icon">
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
            <style>
                body {
                    padding-bottom: 100px; /* Menyisipkan padding pada bagian bawah body sesuai dengan tinggi card */
                }

                #fixedCard {
                    position: fixed;
                    bottom: 0;
                    width: 76%;
                    max-height: 300px; /* Sesuaikan dengan keinginan Anda */
                    overflow-y: auto;
                    background-color: #ffffff;
                    border: 1px solid #f9c25d;
                }

                .float-right {
                    float: right; /* Mengatur floating elemen ke kanan */
                }

                /* Optional: Jika ingin tombol tetap di ujung kanan pada layar yang lebih kecil */
                @media (max-width: 576px) {
                    .float-right {
                        float: none;
                        margin-top: 10px; /* Jarak antara tombol dan konten card */
                        text-align: right;
                    }
                }
            </style>
        </header>

        {{-- message --}}
        {!! Toastr::message() !!}
        {{-- START FORM --}}
        <form action="{{ route('simpan_survei') }}" method="post">
            @csrf
            <div class="page-content">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Buat Paket Pertanyaan</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Judul dan Deskripsi</h4>
                        </div>

                        <div class="card-body">
                            <input type="hidden" name="id_paket" id="id_paket">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" name="judul" class="form-control" id="judul"
                                            placeholder="Masukkan Judul Survei Anda" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="judul" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" id="deskripsi"
                                            rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_responden">Target Responden</label>
                                    <input type="number" name="jumlah_responden" class="form-control" id="jumlah_responden" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for="tgl_mulai">Tanggal Mulai</label>
                                    <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" placeholder="dd-mm-yyyy" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="tgl_selesai">Tanggal Selesai</label>
                                    <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" placeholder="dd-mm-yyyy" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div id="sections-container">
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="question_type">Tipe Pertanyaan</label>
                                            <select class="form-control" id="question_type" name="question_type[]" onchange="toggleQuestionType(this)">
                                                <option value="multiple_choice">Pilihan Ganda</option>
                                                <option value="essay">Essai</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                            <textarea class="form-control" id="pertanyaan" rows="3" name="tanya[]" required></textarea>
                                        </div>
                                        <div class="form-group" id="options-group">
                                            <label for="multiple_choice_options" class="form-label">Opsi Pilihan Ganda</label>
                                            <div id="dynamic-options">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-text">
                                                        <input class="form-check-input" type="radio" name="multiple_choice_correct_answer[0][]" id="option1" value="Option 1">
                                                    </div>
                                                    <input type="text" class="form-control" name="multiple_choice_options[0][]" placeholder="Masukkan Opsi 1" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-text">
                                                        <input class="form-check-input" type="radio" name="multiple_choice_correct_answer[0][]" id="option2" value="Option 2">
                                                    </div>
                                                    <input type="text" class="form-control" name="multiple_choice_options[0][]" placeholder="Masukkan Opsi 2" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-text">
                                                        <input class="form-check-input" type="radio" name="multiple_choice_correct_answer[0][]" id="option3" value="Option 3">
                                                    </div>
                                                    <input type="text" class="form-control" name="multiple_choice_options[0][]" placeholder="Masukkan Opsi 3" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-text">
                                                        <input class="form-check-input" type="radio" name="multiple_choice_correct_answer[0][]" id="option4" value="Option 4">
                                                    </div>
                                                    <input type="text" class="form-control" name="multiple_choice_options[0][]" placeholder="Masukkan Opsi 4" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-text">
                                                        <input class="form-check-input" type="radio" name="multiple_choice_correct_answer[0][]" id="option5" value="Option 5">
                                                    </div>
                                                    <input type="text" class="form-control" name="multiple_choice_options[0][]" placeholder="Masukkan Opsi 5" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jawaban_essai" class="form-label">Jawaban Essai</label>
                                            <textarea class="form-control" id="jawaban_essai" rows="3" name="jawaban_essai[]" style="display: none;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- <button type="button" class="btn btn-danger float-right" onclick="removeQuestion(this)">Hapus Pertanyaan</button> -->
                            </div>
                        </div>
                    </section>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>

        <script>
            function toggleQuestionType(selectElement) {
                var selectedOption = selectElement.value;
                var cardBody = selectElement.closest('.card-body');
                var multipleChoiceOptionsGroup = cardBody.querySelector('#options-group');
                var essayTextArea = cardBody.querySelector('#jawaban_essai');

                if (selectedOption === 'multiple_choice') {
                    multipleChoiceOptionsGroup.style.display = 'block';
                    essayTextArea.style.display = 'none';
                } else if (selectedOption === 'essay') {
                    multipleChoiceOptionsGroup.style.display = 'none';
                    essayTextArea.style.display = 'block';
                }
            }

            function removeQuestion(buttonElement) {
                var sectionToRemove = buttonElement.closest('.card');
                sectionToRemove.remove();
            }
        </script>
    </div>
@endsection
