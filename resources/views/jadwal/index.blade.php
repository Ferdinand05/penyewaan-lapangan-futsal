<x-app-layout title="Jadwal">
    @section('content-title')
        Jadwal Booking
    @endsection



    <div class="container">
        <small>Pembayaran Lunas : {{ $jadwalLunas }}</small><br>
        <small>Pembayaran DP : {{ $jadwalDp }}</small>
        <table class="table table-hover table-bordered">
            <thead class="table-info">
                <tr>
                    <th>No.</th>
                    <th>Fasilitas</th>
                    <th>Pengguna</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
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
                        <td>
                            @if ($j->pembayaran?->status_pembayaran == 'Lunas')
                                <button disabled type="button" class="btn btn-sm btn-warning"
                                    onclick="modalJadwalBayar({{ $j->id }})" id="btnModalBayar">Lunas</button>
                            @else
                                <button type="button" class="btn btn-sm btn-warning"
                                    onclick="modalJadwalBayar({{ $j->id }})" id="btnModalBayar">Bayar</button>
                            @endif

                            <button type="button" class="btn btn-sm btn-info" title="Jadwal Selesai"><i
                                    class="fas fa-check"></i></button>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>

    <div class="modalJadwal"></div>

    <script>
        function modalJadwalBayar(id_jadwal) {
            $.ajax({
                type: "post",
                url: "{{ route('modal-jadwal-bayar') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id_jadwal: id_jadwal
                },
                dataType: "json",
                beforeSend: async function() {
                    $('#btnModalBayar').prop('disabled', true);
                    $('#btnModalBayar').html('<i class="fas fa-spin fa-spinner"></i>');
                },
                complete: async function() {
                    $('#btnModalBayar').prop('disabled', false);
                    $('#btnModalBayar').html('Bayar');

                },
                success: function(response) {
                    if (response.data) {
                        $('.modalJadwal').html(response.data);
                        $('#modalJadwalBayar').modal('show');
                    }
                }
            });
        }
    </script>

</x-app-layout>
