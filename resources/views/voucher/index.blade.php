<x-app-layout title="Data Voucher">
    @section('content-title')
        Data Voucher
    @endsection

    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('voucher.create') }}" class="btn btn-success btn-sm">Create Voucher</a>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <td>No.</td>
                <td>Kode Voucher</td>
                <td>Nilai</td>
                <td>Jenis Diskon</td>
                <td>Tanggal</td>
                <td>Limit</td>
                <td>Digunakan</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($voucher as $v)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $v->kode_voucher }}</td>
                    <td>{{ $v->nilai_diskon }}</td>
                    <td>{{ $v->jenis_diskon }}</td>
                    <td>{{ $v->tanggal_mulai }} - {{ $v->tanggal_selesai }}</td>
                    <td>{{ $v->batas_penggunaan }}</td>
                    <td>{{ $v->jumlah_penggunaan }}</td>
                    <td>
                        <button class="btn btn-sm btn-danger" id=""><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</x-app-layout>
