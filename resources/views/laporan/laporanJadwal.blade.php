<x-app-layout title="Laporan Jadwal">
    @section('content-title')
        Laporan Jadwal
    @endsection

    <div class="container">
        <form action="{{ route('cetak-jadwal-pdf') }}" method="post">
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

        <table class="table table-sm mt-5 table-hover table-bordered">
            <thead class="table-info">
                <tr>
                    <th>No.</th>
                    <th>Fasilitas</th>
                    <th>Pengguna</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($jadwal as $j)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $j->fasilitas->nama_fasilitas }}</td>
                        <td>{{ $j->user->username }}</td>
                        <td>{{ $j->tanggal }}</td>
                        <td>{{ $j->waktu_mulai }} - {{ $j->waktu_akhir }}</td>
                        <td>{{ number_format($j->total_harga, '0', ',', '.') }}</td>
                        <td>
                            @if ($j->status == 'Aktif')
                                <span class="badge badge-primary">{{ $j->status }}</span>
                            @else
                                <span class="badge badge-success">{{ $j->status }}</span>
                            @endif
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>


    </div>


</x-app-layout>
