<x-app-layout title="Pembayaran">
    @section('content-title')
        Data Pembayaran
    @endsection

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <td>No.</td>
                <td>Invoice</td>
                <td>Tanggal</td>
                <td>Fasilitas</td>
                <td>Nama</td>
                <td>Total</td>
                <td>Metode</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($pembayaran as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->invoice }}</td>
                    <td>{{ $p->tanggal_pembayaran }}</td>
                    <td>{{ $p->jadwal->fasilitas->nama_fasilitas }}</td>
                    <td>{{ $p->jadwal->user->username }}</td>
                    <td>{{ number_format($p->total, '0', ',', '.') }}</td>
                    <td>
                        {{ $p->metode_pembayaran }}
                    </td>
                    <td>
                        @if ($p->status_pembayaran == 'Lunas')
                            <span class="badge badge-success">
                                {{ $p->status_pembayaran }}
                            </span>
                        @else
                            <span class="badge badge-danger">
                                {{ $p->status_pembayaran }}
                            </span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm "><i class="fas fa-edit"></i></button>
                        @if ($p->status_pembayaran == 'Lunas')
                            <button class="btn btn-sm btn-secondary" type="submit"><i class="fas fa-print"></i></button>
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</x-app-layout>
