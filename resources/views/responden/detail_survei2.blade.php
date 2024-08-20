@extends('layouts.master')
@section('menu')
    @extends('klien.sidebar.detail_survei')
@endsection
@section('content')
<link href="landingPage/assets/img/logoapp.png" rel="icon">
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        {!! Toastr::message() !!}
        <div class="page-content">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Survei</h3>
                        <p class="text-subtitle text-muted">Detail Survei Anda</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('detail_survei') }}">Survei</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Survei</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <h4 class="card-title">Judul dan Deskripsi</h4>
                        <a href="#">
                            <span class="badge btn-danger btn-lg" style="font-size: 24px;">{{ $survei->deskripsi_validasi }}</span>
                        </a>
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
                        </div>

                    </div>
                </div>
        </div>
        </section>

        <div id="sections-container">
            <section class="section">
                @foreach ($pertanyaan as $index => $pertanyaanItem)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"
                                            class="form-label"><strong>Pertanyaan</strong></label>
                                        <p type="text">
                                            {{ $pertanyaanItem->pertanyaan }}
                                        </p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                            id="flexRadioDisabled" disabled>
                                        <label class="form-check-label" for="flexRadioDisabled">
                                            {{ $pertanyaanItem->opsi_1 }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                            id="flexRadioDisabled" disabled>
                                        <label class="form-check-label" for="flexRadioDisabled">
                                            {{ $pertanyaanItem->opsi_2 }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                            id="flexRadioDisabled" disabled>
                                        <label class="form-check-label" for="flexRadioDisabled">
                                            {{ $pertanyaanItem->opsi_3 }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                            id="flexRadioDisabled" disabled>
                                        <label class="form-check-label" for="flexRadioDisabled">
                                            {{ $pertanyaanItem->opsi_4 }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                            id="flexRadioDisabled" disabled>
                                        <label class="form-check-label" for="flexRadioDisabled">
                                            {{ $pertanyaanItem->opsi_5 }}
                                        </label>
                                    </div>
                                    <div class="form-check">

                                        <div id="myChart{{ $index }}" style="width:100%; max-width:600px; height:350px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </section>
            <script>
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(function() {
                    drawChart(
                        '{{ $pertanyaanItem->opsi_1 }}',
                        '{{ $pertanyaanItem->opsi_2 }}',
                        '{{ $pertanyaanItem->opsi_3 }}',
                        '{{ $pertanyaanItem->opsi_4 }}',
                        '{{ $pertanyaanItem->opsi_5 }}',
                        'myChart{{ $index }}'
                    );
                });

                function drawChart(opsi_1, opsi_2, opsi_3, opsi_4, opsi_5, chartId) {

                    // Set Data
                    const data = google.visualization.arrayToDataTable([
                        ['Country', 'Mhl'],
                        [opsi_1, 54],
                        [opsi_2, 30],
                        [opsi_3, 10],
                        [opsi_4, 9],
                        [opsi_5, 3],

                    ]);

                    // Set Options
                    const options = {};


                    // Draw
                    const chart = new google.visualization.PieChart(document.getElementById(chartId));
                    chart.draw(data, options);
                }
            </script>
            @endforeach
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted d-flex justify-content-center align-items-end">
                <div class="float-start">
                    <p>2024 &copy; Aplikasi Survey dan Analisis Data</p>
                </div>
            </div>
        </footer>
    </div>
@endsection
