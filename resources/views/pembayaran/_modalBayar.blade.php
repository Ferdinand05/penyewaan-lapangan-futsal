<!-- Modal -->
<div class="modal fade" id="modalJadwalBayar" tabindex="-1" aria-labelledby="modalJadwalBayarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalJadwalBayarLabel">Pembayaran</h5>

            </div>
            <div class="modal-body">
                <small>Invoice</small>
                <input type="text" name="invoice" id="invoice" value="{{ $invoice }}" readonly disabled
                    class="form-control">
                <input type="hidden" name="id_jadwal" id="id_jadwal" value="{{ $jadwal->id }}">
                <hr>
                <div class="form-group">
                    <small class="text-secondary">Detail Pelanggan</small>
                    <div>{{ $jadwal->user->username }} - {{ $jadwal->user->no_telp }}</div>
                    <div>{{ $jadwal->user->email }}</div>
                </div>
                <div class="form-group">
                    <small class="text-secondary">Detail Transaksi</small>
                    <div>Fasilitas : {{ $jadwal->fasilitas->nama_fasilitas }}</div>
                    <div>Tanggal / Waktu : {{ $jadwal->tanggal }} / {{ $jadwal->waktu_mulai }} -
                        {{ $jadwal->waktu_akhir }}</div>
                    <div>Harga : {{ number_format($jadwal->total_harga, '0', ',', '.') }}</div>
                </div>
                <hr>
                <div class="form-group">
                    <small>Metode Pembayaran</small>
                    <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                        <option disabled selected>Pilih Metode Pembayaran</option>
                        <option value="Cash">Cash</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="E-Wallet">E-Wallet</option>
                    </select>
                </div>

                <div class="form-group">
                    <small>Status Pembayaran</small>
                    <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                        <option disabled selected>Pilih Status Pembayaran</option>
                        <option value="Lunas">Lunas</option>
                        <option value="DP">DP</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-warning" id="btnPembayaran">Submit</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalBayar"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#closeModalBayar').click(function(e) {
        e.preventDefault();
        $('#modalJadwalBayar').modal('hide');
    });

    $('#btnPembayaran').click(function(e) {
        e.preventDefault();
        const metode_pembayaran = $('#metode_pembayaran').val();
        console.log(metode_pembayaran);
        if (metode_pembayaran == null) {
            Swal.fire({
                title: "Ooopss!",
                text: 'Metode & Status pembayaran harus diisi',
                icon: "error"
            });
        } else {
            Swal.fire({
                title: "Are you sure?",
                text: "Konfirmasi pembayaran",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Bayar"
            }).then((result) => {
                $.ajax({
                    type: "post",
                    url: "{{ route('pembayaran.store') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        invoice: $('#invoice').val(),
                        id_jadwal: $('#id_jadwal').val(),
                        metode_pembayaran: $('#metode_pembayaran').val(),
                        status_pembayaran: $('#status_pembayaran').val(),
                    },
                    dataType: "json",
                    success: function(response) {
                        if (result.isConfirmed) {
                            if (response.success) {
                                Swal.fire({
                                    title: "Dibayar!",
                                    text: response.success,
                                    icon: "success"
                                });

                                $('#modalJadwalBayar').modal('hide');

                                setInterval(() => {
                                    window.location.reload();
                                }, 1500);
                            }

                            if (response.fail) {
                                Swal.fire({
                                    title: "Error",
                                    text: response.fail,
                                    icon: "error"
                                });
                                $('#modalJadwalBayar').modal('hide');

                            }

                        }
                    }
                });
            });
        }


    });
</script>
