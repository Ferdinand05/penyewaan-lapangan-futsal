<x-app-layout title="Pembayaran">
    @section('content-title')
        Data Pembayaran
    @endsection

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <td>No.</td>
                <td>Invoice</td>
                <td>Tanggal Bayar</td>
                <td>Fasilitas</td>
                <td>Nama</td>
                <td>Total</td>
                <td>Metode Bayar</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($pembayaran as $p)
            @endforeach

            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $p->invoice }}</td>
                <td>{{ $p->tanggal_pembayaran }}</td>
                <td>{{ $p->jadwal->fasilitas->nama_fasilitas }}</td>
                <td>{{ $p->jadwal->user->username }}</td>
                <td>{{ number_format($p->total, '0', ',', '.') }}</td>
                <td>{{ $p->metode_pembayaran }}</td>
                <td>{{ $p->status_pembayaran }}</td>
                <td>
                    <button class="btn btn-info btn-sm "><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-secondary" type="submit"><i class="fas fa-print"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</x-app-layout>
