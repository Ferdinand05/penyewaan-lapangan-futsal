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
