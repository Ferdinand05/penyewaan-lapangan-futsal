@include('layouts.header', ['title' => 'Booking Fasilitas'])
<div class="container-md container m-5">
    <div class="mb-3">
        <a href="{{ route('home') }}" class="btn btn-danger btn-sm">Kembali</a>
        <div>
            <small>*Aturan Booking :
                <ul>
                    <li>Waktu yang anda jadwalkan akan dibulatkan 60 menit kebawah, contoh : 12:45 = 12:00</li>
                    <li>Setelah selesai booking, harap cetak bukti dan tunjukkan kepada admin ditempat</li>
                    <li>Konfirmasi booking maksimal 15 menit sebelum booking dimulai</li>
                    <li>Terkait pertanyaan bisa hubungi admin (089231239)</li>
                </ul>
            </small>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $fasilitas->nama_fasilitas }} - {{ $fasilitas->tipe_fasilitas }}</h3>
                    <h5>Nama : {{ Auth::user()->username }}</h5>
                    <input type="hidden" name="id_lapangan" id="id_lapangan" value="{{ $fasilitas->id }}">
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-5">
                                    <small>Kode Voucher (optional)</small>
                                    <input type="text" name="kode_voucher" id="kode_voucher" class="form-control"
                                        placeholder="Kode Voucher">
                                </div>
                            </div>
                        </li>
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
                            <input type="number" value="{{ $fasilitas->harga }}" name="harga" id="harga"
                                class="form-control" disabled readonly>
                        </li>
                        <li class="list-group-item">
                            <h4>Total Harga : <input type="text" disabled readonly name="total_harga"
                                    id="total_harga">
                            </h4>
                        </li>
                        <div class="mt-2 text-center">
                            <button type="button" class="btn btn-primary " id="booking">Booking</button>
                            <form action="{{ route('cetak-resi-booking') }}" method="post" id="formCetakResi">
                                @csrf
                                <input type="hidden" name="id_booking" value="" id="id_booking" value="">
                                <button type="submit" class="btn btn-secondary d-none" id="fakturBooking">Cetak
                                    Resi</button>
                            </form>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h5>Jadwal Booking berlangsung</h5>
            <table class="table-sm table-bordered table-responsive table">
                <tr>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Status</th>
                </tr>
                @foreach ($booking as $b)
                    <tr>
                        <td>{{ $b->tanggal_booking }}</td>
                        <td>{{ $b->waktu_mulai . '-' . $b->waktu_akhir }}</td>
                        <td>
                            @if ($b->status == 'Dikonfirmasi')
                                <span class="badge badge-success">{{ $b->status }}</span>
                            @else
                                <span class="badge badge-primary">{{ $b->status }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
            <small>Jika status = Pending ada kemungkinan booking batal</small>
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
        const waktu_akhir = $('#waktu_akhir').val();
        if (tanggal_booking.length == 0 || waktu_akhir.length == 0) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Data booking tidak lengkap",
            });
        } else {
            Swal.fire({
                title: "apakah anda yakin ?",
                text: "Anda akan melakukan booking",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Booking!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('booking.store') }}",
                        data: {
                            _token: '{{ csrf_token() }}',
                            tanggal_booking: tanggal_booking,
                            total_harga: total_harga,
                            waktu_mulai: $('#waktu_mulai').val(),
                            waktu_akhir: $('#waktu_akhir').val(),
                            id_lapangan: $('#id_lapangan').val(),
                            kode_voucher: $('#kode_voucher').val()
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "Booking Berhasil",
                                    text: response.success + '\n' +
                                        '\n Cetak Resi/Faktur Booking',
                                    icon: "success"
                                });

                                $('#id_booking').val(response.booking.id);
                                $('#fakturBooking').removeClass('d-none');
                                $('#booking').addClass('d-none');
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
        }
    });
</script>





@include('layouts.footer')
