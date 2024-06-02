<x-app-layout title="Data Voucher">
    @section('content-title')
        Data Voucher
    @endsection

    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('voucher.create') }}" class="btn btn-success btn-sm">Create Voucher</a>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <td>No.</td>
                <td>Kode Voucher</td>
                <td>Nilai</td>
                <td>Jenis Diskon</td>
                <td>Tanggal</td>
                <td>Limit</td>
                <td>Digunakan</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($voucher as $v)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $v->kode_voucher }}</td>
                    <td>{{ $v->nilai_diskon }}</td>
                    <td>{{ $v->jenis_diskon }}</td>
                    <td>{{ $v->tanggal_mulai }} - {{ $v->tanggal_selesai }}</td>
                    <td>{{ $v->batas_penggunaan }}</td>
                    <td>{{ $v->jumlah_penggunaan }}</td>
                    <td>
                        <a href="{{ route('voucher.edit', $v->id) }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger" id=""
                            onclick="destroyVoucher({{ $v->id }})"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <script>
        function destroyVoucher(id_voucher) {
            Swal.fire({
                title: "Are you sure?",
                text: "Data Voucher akan segera dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: "{{ route('voucher.destroy', ' +id_voucher+ ') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id_voucher: id_voucher
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
