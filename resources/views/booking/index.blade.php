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
                        <div><span class="h5">{{ $b->lapangan->nama_lapangan }}</span> -
                            {{ $b->lapangan->tipe_lapangan }}</div>
                    </div>
                    <div class="card-body">
                        <div>Nama : {{ $b->user->username }}</div>
                        <div>Waktu : {{ $b->waktu_mulai }} - {{ $b->waktu_akhir }}</div>
                        <div>Total Harga : {{ number_format($b->total_harga, '0', ',', '.') }}</div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-info ">Booked</button>
                        <button class="btn btn-sm btn-danger">Cancel</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
