@extends('layouts.admin.sidebar.paket_pertanyaan')

@section('content')
    <h1>Paket Pertanyaan</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Paket</th>
                <th>Pertanyaan</th>
                <!-- Tambahkan kolom lainnya jika diperlukan -->
            </tr>
        </thead>
        <tbody>
            @foreach ($paketPertanyaan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_paket }}</td>
                    <td>{{ $item->pertanyaan }}</td>
                    <!-- Tambahkan kolom lainnya jika diperlukan -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
