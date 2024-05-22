<x-app-layout title="Lapangan">
    @section('content-title')
        Data Lapangan
    @endsection

    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('lapangan.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah
                Lapangan</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>No.</td>
                        <th>Nama Lapangan</td>
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
                    @foreach ($lapangan as $l)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $l->nama_lapangan }}</td>
                            <td>{{ $l->tipe_lapangan }}</td>
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
