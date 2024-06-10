@extends('layouts.master')

@section('menu')
    @extends('klien.sidebar.dashboard')
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
            </div>
        </form>

            <button type="button" class="btn btn-success" onclick="addSection()">Tambah Pertanyaan</button>
            <button type="button" class="btn btn-danger" onclick="removeSection()">Hapus Pertanyaan</button>
            </div>
            <br>
            <br>

            {{-- <input type="hidden" name="pertanyaanArray" id="pertanyaanArrayInput" value=""> --}}
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary mx-auto d-block" onclick="submitForm(e)">Kirim Survei</button>
            </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted d-flex justify-content-center align-items-end">
                <div class="float-start">
                    <p>2023 &copy; Aplikasi Survey dan Analisis Data</p>
                </div>
            </div>
        </footer>
    </div>
    </form>
    {{-- END FORM --}}

    <script>
     
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
@endsection
