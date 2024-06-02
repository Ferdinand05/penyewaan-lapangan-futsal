<x-app-layout title="Jadwal">
    @section('content-title')
        Jadwal Booking
    @endsection

    <div class="row mb-2">
        <div class="col-md-6">
            <div class="input-group mb-3">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari..."
                    aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <small>Pembayaran Lunas : {{ $jadwalLunas }}</small><br>
        <small>Pembayaran DP : {{ $jadwalDp }}</small>
        <table class="table  mt-3 table-hover table-bordered">
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
                                @if ($j->status == 'Selesai')
                                    <button type="button" disabled onclick="selesaiJadwal({{ $j->id }})"
                                        class="btn btn-sm btn-info" title="Jadwal Selesai"><i
                                            class="fas fa-check"></i></button>
                                @else
                                    <button type="button" onclick="selesaiJadwal({{ $j->id }})"
                                        class="btn btn-sm
                                    btn-info"
                                        title="Jadwal Selesai"><i class="fas fa-check"></i></button>
                                @endif
                            @elseif($j->pembayaran?->status_pembayaran == 'DP')
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="modalJadwalBayar({{ $j->id }})"
                                    id="btnModalBayar">{{ $j->pembayaran?->status_pembayaran }}</button>
                            @else
                                <button type="button" class="btn btn-sm btn-warning"
                                    onclick="modalJadwalBayar({{ $j->id }})" id="btnModalBayar">Bayar</button>
                            @endif


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

        function selesaiJadwal(id_jadwal) {
            Swal.fire({
                title: "Are you sure?",
                text: "Booking akan diselesaikan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('selesai-jadwal') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id_jadwal: id_jadwal
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: response.success,
                                    showConfirmButton: false,
                                    timer: 1200


                                });
                                setInterval(() => {
                                    window.location.reload();
                                }, 1500);
                            }

                            if (response.fail) {
                                Swal.fire({
                                    position: "center",
                                    icon: "question",
                                    title: response.fail,
                                    showConfirmButton: true,
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>

</x-app-layout>
