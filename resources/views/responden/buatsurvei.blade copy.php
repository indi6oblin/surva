@extends('layouts.master')

@section('menu')
    @extends('klien.sidebar.buatsurvei')
@endsection

@section('content')
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
                    width: 79%;
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

        <body>
        {{-- message --}}
        {!! Toastr::message() !!}
        {{-- START FORM --}}
        <form action="{{ route('simpan_survei') }}" method="post">
            @csrf
            <div class="page-content">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Buat Survei</h3>
                            <p class="text-subtitle text-muted">Tambahkan Survei Anda</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Survei</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Buat Survei</li>
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
                            <input type="hidden" name="id_klien" value="{{ auth()->user()->id_klien }}" id="id_klien">
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
                                        <small class="text-muted"><i></i></small>
                                        <input type="number" name="jumlah_responden" class="form-control" id="jumlah_responden" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="tgl_mulai">Tanggal Mulai</label>
                                        <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" placeholder="dd-mm-yyyy" required>
                                        <p><small class="text-muted"></small>
                                        </p>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="tgl_selesai">Tanggal Selesai</label>
                                        <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" placeholder="dd-mm-yyyy" required>
                                        <p><small class="text-muted"></small>
                                        </p>
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
                                        <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                        <textarea class="form-control" id="pertanyaan" rows="3" name="tanya[]" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="opsi_1." placeholder="Opsi 1" name="opsi_1[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="opsi_2" placeholder="Opsi 2" name="opsi_2[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="opsi_3" placeholder="Opsi 3" name="opsi_3[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="opsi_4" placeholder="Opsi 4" name="opsi_4[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="opsi_5" placeholder="Opsi 5" name="opsi_5[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                </div>
                <button type="button" class="btn btn-success" onclick="addSection()">Tambah Pertanyaan</button>
                <button type="button" class="btn btn-danger" onclick="removeSection()">Hapus Pertanyaan</button>

                <div id="fixedCard" class="card">
                    <div class="card-body">
                        <h4 class="card-title">Harga Survei: <span id="totalHarga">0</span></h4>
                        <button type="submit" class="btn btn-primary float-right" onclick="submitForm(e)">Kirim Survei</button>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <footer>
                <div class="footer clearfix mb-0 text-muted d-flex justify-content-center align-items-end">
                    <div class="float-start">
                        <p>2023 &copy; Aplikasi Survey dan Analisis Data</p>
                    </div>
                </div>
            </footer>
        </form>
    </div>

    {{-- END FORM --}}

    <script>
        var sectionCounter = 1;
        var pertanyaanArray = [];

        function addSection() {
            // Clone the first section
            var newSection = $("#sections-container .section:first").clone();

            // Clear input values and textarea content in the cloned section
            newSection.find("input, textarea").val('');
            newSection.find("input[type=radio]").prop('checked', false);

            // Increment IDs and names to avoid duplicates
            newSection.find("*").each(function () {
                var currentId = $(this).attr("id");
                var currentName = $(this).attr("name");

                if (currentId) {
                    $(this).attr("id", currentId);
                }

                if (currentName) {
                    $(this).attr("name", currentName);
                }
            });

            // Increment the section counter
            sectionCounter++;

            // Append the new section to the container
            $("#sections-container").append(newSection);

            // Collect data from the new section
            var sectionData = {
                pertanyaan: newSection.find("#tanya".$sectionCounter).val(),
                opsi_1: newSection.find("#opsi_1".$sectionCounter).val(),
                opsi_2: newSection.find("#opsi_2".$sectionCounter).val(),
                opsi_3: newSection.find("#opsi_3".$sectionCounter).val(),
                opsi_4: newSection.find("#opsi_4".$sectionCounter).val(),
                opsi_5: newSection.find("#opsi_5".$sectionCounter).val(),
            };

            // Add the collected data to an array
            pertanyaanArray.push(sectionData);

        }

        function removeSection() {
        // Ensure that there is at least one section
        if (sectionCounter > 1) {
            // Remove the last section
            $("#sections-container .section:last").remove();

            // Decrement the section counter
            sectionCounter--;

            // Remove the corresponding data from the array
            pertanyaanArray.pop();
        }
    }

        function submitForm(e) {
            e.preventDefault();
            if ( confirm("Apakah Anda yakin ingin menyimpan survei?") ){
                var formData = {
                judul: $("#judul").val(),
                deskripsi: $("#deskripsi").val(),
                tgl_mulai: $("#tgl_mulai").val(),
                tgl_selesai: $("#tgl_selesai").val(),
                jumlah_responden: $("#jumlah_responden").val(),
            };

            var combinedData = {
                formData: formData,
                pertanyaanArray: pertanyaanArray
            };

            // Convert the data to JSON
            $.ajax({
                type: "POST",
                url: "/simpansurvei",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify(combinedData),
                success: function (response) {
                    console.log("Data successfully stored:", response);
                    // Handle success, redirect, or show a success message
                },
                error: function (error) {
                    console.log("Error storing data:", error);
                    // Handle error or show an error message
                }
            });

            } else {
                return false;
            }
            // Loop through each section and submit the data

        }

    </script>
</body>
@endsection
