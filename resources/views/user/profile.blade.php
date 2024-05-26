@include('layouts.header', ['title' => $user->username])

<div class="container mb-5">
    <div class="mt-5">
        <a href="{{ route('home') }}" class="btn btn-sm btn-danger">Kembali</a>
    </div>
    <div class="card mt-3">
        <div class="card-header p-4">
            <small>Profile</small><br>
            <h1>{{ $user->username }}</h1>
            <h4>{{ $user->email }}</h4>
            <h6>Account created {{ $user->created_at->toFormattedDateString() }}</h6>
        </div>
        <div class="card-body">
            <h5>Booking</h5>
            <div class="d-flex flex-wrap">
                @foreach ($userBooking as $b)
                    <div class="card mr-2 mt-2">
                        <div class="card-header">
                            {{ $b->fasilitas->nama_fasilitas }} - {{ $b->fasilitas->tipe_fasilitas }}
                        </div>
                        <div class="card-body">
                            <div>
                                <small class="text-secondary">Tanggal/Waktu</small><br>
                                {{ $b->tanggal_booking }} /
                                {{ $b->waktu_mulai }} - {{ $b->waktu_akhir }}
                            </div>
                            <div>
                                <small class="text-secondary">Total Harga</small><br>
                                {{ number_format($b->total_harga, '0', ',', '.') }}
                            </div>
                        </div>
                        <div class="card-footer d-flex gap-1">
                            <button class="btn btn-danger btn-sm" title="Cancel Booking"
                                onclick="cancelBooking({{ $b->id }})">Cancel Booking</button>
                            <form action="{{ route('cetak-resi-booking') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $b->id }}" name="id_booking">
                                <button type="submit" class="btn btn-sm btn-secondary"><i class="fas fa-print"
                                        title="Cetak Bukti/Resi Booking"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <h5>Riwayat Booking</h5>
        </div>
    </div>
</div>
</div>


<script>
    function cancelBooking(id_booking) {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data booking akan dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "delete",
                    url: "{{ route('cancel-booking', ' + id_booking + ') }}",
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
                                timer: 1200
                            });


                            setInterval(() => {
                                window.location.reload();
                            }, 1200);
                        }

                        if (response.fail) {
                            Swal.fire({
                                title: "The Internet?",
                                text: response.fail,
                                icon: "question"
                            });
                        }
                    }
                });
            }
        });
    }
</script>

@include('layouts.footer')
