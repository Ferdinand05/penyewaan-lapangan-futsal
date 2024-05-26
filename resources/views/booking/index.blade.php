<x-app-layout title="Data Booking">
    @section('content-title')
        Data Booking
    @endsection

    <div class="row mb-3">
        <div class="col">

        </div>
    </div>

    <div class="row row-cols-3">
        @foreach ($bookings as $b)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <div><span class="h5">{{ $b->fasilitas->nama_fasilitas }}</span> -
                            {{ $b->fasilitas->tipe_fasilitas }}</div>
                    </div>
                    <div class="card-body">
                        <div>Nama : {{ $b->user->username }}</div>
                        <div>Waktu : {{ $b->waktu_mulai }} - {{ $b->waktu_akhir }}</div>
                        <div>Total Harga : {{ number_format($b->total_harga, '0', ',', '.') }}</div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-success">Terima</button>
                        <button class="btn btn-sm btn-danger"
                            onclick="destroyBooking({{ $b->id }})">Cancel</button>
                    </div>
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
    </script>

</x-app-layout>
