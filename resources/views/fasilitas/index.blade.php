<x-app-layout title="Fasilitas">
    @section('content-title')
        Data Fasilitas
    @endsection

    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('fasilitas.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah
                Fasilitas</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>No.</td>
                        <th>Nama Fasilitas</td>
                        <th>Tipe</td>
                        <th>Harga/Jam</td>
                        <th style="width: 30%">Deskripsi</td>
                        <th>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($fasilitas as $l)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $l->nama_fasilitas }}</td>
                            <td>{{ $l->tipe_fasilitas }}</td>
                            <td>{{ number_format($l->harga, '0', ',', '.') }}</td>
                            <td>{{ $l->deskripsi }}</td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
