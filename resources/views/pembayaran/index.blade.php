<x-app-layout title="Pembayaran">
    @section('content-title')
        Data Pembayaran
    @endsection

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group mb-3">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari..."
                    aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-hover table-striped">
        <thead class="table-primary">
            <tr>
                <td>No.</td>
                <td>Invoice</td>
                <td>Nama</td>
                <td>Fasilitas</td>
                <td>Tanggal Bayar</td>
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
                    <td>{{ $p->jadwal->user->username }}</td>
                    <td>{{ $p->jadwal->fasilitas->nama_fasilitas }} ({{ number_format($p->harga, '0', ',', '.') }})</td>
                    <td>{{ $p->tanggal_pembayaran }}</td>
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
                        <button class="btn btn-info btn-sm " onclick="modalDetail({{ $p->id }})"><i
                                class="fas fa-eye"></i></button>
                        <button class="btn btn-danger btn-sm " onclick="destroyPembayaran({{ $p->id }})"><i
                                class="fas fa-trash-alt"></i></button>
                        @if ($p->status_pembayaran == 'Lunas')
                            <form action="{{ route('cetak-bukti-bayar') }}" method="post">
                                @csrf
                                <input type="hidden" name="id_pembayaran" value="{{ $p->id }}">
                                <button class="btn btn-sm btn-secondary" type="submit"><i
                                        class="fas fa-print"></i></button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="modalPembayaran"></div>
    <script>
        function destroyPembayaran(id_pembayaran) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: "{{ route('pembayaran.destroy', ' +id_pembayaran + ') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id_pembayaran: id_pembayaran
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });

                                setInterval(() => {
                                    window.location.reload();
                                }, 1500);
                            }
                        }
                    });
                }
            });
        }

        function modalDetail(id_pembayaran) {
            $.ajax({
                type: "get",
                url: "{{ route('pembayaran.show', ' + id_pembayaran +') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id_pembayaran: id_pembayaran
                },
                dataType: "json",
                success: function(response) {
                    $('.modalPembayaran').html(response.data);
                    $('#modalDetail').modal('show');
                }
            });
        }
    </script>

</x-app-layout>
