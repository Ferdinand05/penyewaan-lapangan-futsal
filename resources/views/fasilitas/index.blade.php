<x-app-layout title="Fasilitas">
    @section('content-title')
        Data Fasilitas
    @endsection

    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('fasilitas.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah
                Fasilitas</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>No.</td>
                        <th>Nama Fasilitas</td>
                        <th>Tipe</td>
                        <th>Harga/Jam</td>
                        <th style="width: 30%">Deskripsi</td>
                        <th>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($fasilitas as $l)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $l->nama_fasilitas }}</td>
                            <td>{{ $l->tipe_fasilitas }}</td>
                            <td>{{ number_format($l->harga, '0', ',', '.') }}</td>
                            <td>{{ $l->deskripsi }}</td>
                            <td>
                                <a href="{{ route('fasilitas.edit', $l->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <button type="button" onclick="destroyFasilitas({{ $l->id }})"
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function destroyFasilitas(id_fasilitas) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: "{{ route('fasilitas.destroy', '+id_fasilitas+') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id_fasilitas: id_fasilitas
                        },
                        dataType: "json",
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                        }
                    });
                }
            });
        }
    </script>

</x-app-layout>
