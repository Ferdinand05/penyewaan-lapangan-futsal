@include('layouts.header', ['title' => 'Booking Lapangan'])

<div class="container-md container m-5">
    <div class="mb-3">
        <a href="{{ route('home') }}" class="btn btn-danger btn-sm">Kembali</a>
        <div>
            <small>*Aturan Booking :
                <ul>
                    <li>Antara Jam Mulai dan Jam Akhir Harus sesuai, contoh : 13:19 dan 14:19 (1 jam)</li>
                    <li>Terkait pertanyaan bisa hubungi admin (089231239)</li>
                    <li>Setelah selesai booking, harap cetak bukti dan tunjukkan kepada admin ditempat</li>
                </ul>

            </small>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $lapangan->nama_lapangan }} - {{ $lapangan->tipe_lapangan }}</h3>
                    <h5>Nama : {{ Auth::user()->username }}</h5>
                    <input type="hidden" name="id_lapangan" id="id_lapangan" value="{{ $lapangan->id }}">
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <small>Tanggal Booking</small>
                            <input type="date" name="tanggal_booking" id="tanggal_booking" class="form-control">
                        </li>
                        <li class="list-group-item">
                            <small>Jam Mulai</small>
                            <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control">
                        </li>
                        <li class="list-group-item">
                            <small>Jam Akhir</small>
                            <input type="time" name="waktu_akhir" id="waktu_akhir" class="form-control">
                        </li>
                        <li class="list-group-item">
                            <small>Harga/jam</small>
                            <input type="number" value="{{ $lapangan->harga }}" name="harga" id="harga"
                                class="form-control" disabled readonly>
                        </li>
                        <li class="list-group-item">
                            <h4>Total Harga : <input type="text" disabled readonly name="total_harga"
                                    id="total_harga" value="">
                            </h4>
                        </li>
                        <div class="mt-2 text-center">
                            <button type="button" class="btn btn-primary " id="booking">Booking</button>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <table class="table-sm table-bordered table-responsive table">
                <tr>
                    <th>Tanggal Booking</th>
                    <th>Waktu</th>
                </tr>
                @foreach ($booking as $b)
                    <tr>
                        <td>{{ $b->tanggal_booking }}</td>
                        <td>{{ $b->waktu_mulai . '-' . $b->waktu_akhir }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
</div>



<script>
    $('#waktu_akhir').change(function(e) {
        e.preventDefault();
        const waktu_mulai = parseInt($('#waktu_mulai').val());
        const waktu_akhir = parseInt($('#waktu_akhir').val());
        const hargaPerJam = parseInt($('#harga').val());

        console.log(waktu_akhir - waktu_mulai);
        const totalWaktu = waktu_akhir - waktu_mulai;
        const totalHarga = totalWaktu * hargaPerJam;

        $('#total_harga').val(totalHarga);

    });
    $('#waktu_mulai').change(function(e) {
        e.preventDefault();
        const waktu_mulai = parseInt($('#waktu_mulai').val());
        const waktu_akhir = parseInt($('#waktu_akhir').val());
        const hargaPerJam = parseInt($('#harga').val());

        console.log(waktu_akhir - waktu_mulai);
        const totalWaktu = waktu_akhir - waktu_mulai;
        const totalHarga = totalWaktu * hargaPerJam;

        $('#total_harga').val(totalHarga);

    });




    $('#booking').click(function(e) {
        e.preventDefault();
        const tanggal_booking = $('#tanggal_booking').val();
        const total_harga = $('#total_harga').val();
        if (tanggal_booking.length == 0 || total_harga.length == 0) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Data booking tidak lengkap",
            });
        } else {
            $.ajax({
                type: "post",
                url: "{{ route('booking.store') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    tanggal_booking: tanggal_booking,
                    total_harga: total_harga,
                    waktu_mulai: $('#waktu_mulai').val(),
                    waktu_akhir: $('#waktu_akhir').val(),
                    id_lapangan: $('#id_lapangan').val()
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Good job!",
                            text: response.success,
                            icon: "success"
                        });
                    }

                    if (response.fail) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: response.fail,
                        });
                    }
                }
            });
        }
    });
</script>






@include('layouts.footer')
