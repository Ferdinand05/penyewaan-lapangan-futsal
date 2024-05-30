<x-app-layout title="Laporan Pembayaran">
    @section('content-title')
        Laporan Pembayaran
    @endsection
    <div class="container">
        <form action="{{ route('cetak-pembayaran-pdf') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md">
                    <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                    <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control">
                </div>
                <div class="col-md">
                    <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="" class="form-label">Cetak PDF</label>
                    <div class="input-group">
                        <button type="submit" class="btn btn-primary"> Cetak</button>
                    </div>
                </div>
            </div>
        </form>



        <table class="table table-hover table-sm mt-5">
            <thead class="table-primary">
                <tr>
                    <td>No.</td>
                    <td>Invoice</td>
                    <td>Tanggal Bayar</td>
                    <td>Waktu Sewa</td>
                    <td>Nama</td>
                    <td>Total</td>
                    <td>Metode</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($pembayaran as $p)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $p->invoice }}</td>
                        <td>{{ $p->tanggal_pembayaran }}</td>
                        <td>{{ $p->jadwal->waktu_mulai }} - {{ $p->jadwal->waktu_akhir }} </td>
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

                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</x-app-layout>
