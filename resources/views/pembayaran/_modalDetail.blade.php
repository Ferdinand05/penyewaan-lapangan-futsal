<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel">Detail Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>#{{ $pembayaran->invoice }}</h4>
                <ul class="list-group">
                    <li class="list-group-item"><small>Tanggal Sewa</small><br>{{ $pembayaran->jadwal->tanggal }}</li>
                    <li class="list-group-item"><small>Waktu Sewa</small><br>{{ $pembayaran->jadwal->waktu_mulai }} -
                        {{ $pembayaran->jadwal->waktu_akhir }}</li>
                    <li class="list-group-item"><small>Tanggal
                            Sewa</small><br>{{ $pembayaran->jadwal->fasilitas->nama_fasilitas }}
                        ({{ number_format($pembayaran->harga, '0', ',', '.') }})</li>
                    <li class="list-group-item"><small>Status Pembayaran &
                            Lapangan</small><br>{{ $pembayaran->status_pembayaran }} & {{ $pembayaran->jadwal->status }}
                    </li>
                    <li class="list-group-item"><small>Metode Pembayaran</small><br>{{ $pembayaran->metode_pembayaran }}
                    </li>
                    <li class="list-group-item"><small>Tanggal
                            Pembayaran</small><br>{{ $pembayaran->tanggal_pembayaran }}
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeButton" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.closeButton').click(function(e) {
        e.preventDefault();
        $('#modalDetail').modal('hide');
    });
</script>
