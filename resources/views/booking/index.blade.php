<x-app-layout title="Data Booking">
    @section('content-title')
        Data Booking
    @endsection

    <div class="row mb-3">
        <div class="col">
            <a href="" class="btn btn-success btn-sm">Tambah Booking</a>
        </div>
    </div>

    <div class="row row-cols-3">
        @foreach ($bookings as $b)
            <div class="col-md-4 mb-3">
                <div class="card ">
                    <div class="card-header @if ($b->status == 'Dikonfirmasi') bg-info @endif">
                        <div><span class="h5">{{ $b->fasilitas->nama_fasilitas }}</span> -
                            {{ $b->fasilitas->tipe_fasilitas }}</div>
                        <small>Created at {{ $b->created_at }}</small><br>
                        <small class="badge badge-primary">{{ $b->status }}</small>

                    </div>
                    <div class="card-body">
                        <div>Nama : <b>{{ $b->user->username }}</b> ({{ $b->user->no_telp }})</div>
                        <div>Tanggal Booking : {{ $b->tanggal_booking }}</div>
                        <div>Waktu : {{ $b->waktu_mulai }} - {{ $b->waktu_akhir }}</div>
                        <div>Total Harga : {{ number_format($b->total_harga, '0', ',', '.') }}</div>
                    </div>
                    @if ($b->status == 'pending')
                        <div class="card-footer">
                            <button class="btn btn-sm btn-success"
                                onclick="terimaBooking({{ $b->id }})">Terima</button>
                            <button class="btn btn-sm btn-danger"
                                onclick="destroyBooking({{ $b->id }})">Cancel</button>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>


    <script>
        function destroyBooking(id_booking) {
            Swal.fire({
                title: "Are you sure?",
                text: "data booking akan terhapus",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: "{{ route('booking.destroy', ' + id_booking  +') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id_booking: id_booking
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: response.success,
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

        function terimaBooking(id_booking) {
            Swal.fire({
                title: "Are you sure?",
                text: "Data booking akan di pindahkan ke table jadwal",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('jadwal.store') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id_booking: id_booking
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: response.success,
                                    showConfirmButton: false,
                                    timer: 1000
                                });

                                setInterval(() => {
                                    window.location = "{{ route('jadwal.index') }}"
                                }, 1500);
                            }
                        }
                    });
                }
            });
        }
    </script>

</x-app-layout>
