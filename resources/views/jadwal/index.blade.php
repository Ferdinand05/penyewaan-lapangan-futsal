<x-app-layout title="Jadwal">
    @section('content-title')
        Jadwal Booking
    @endsection

    <div class="row mb-3">
        <div class="col">
            <a href="" class="btn btn-success btn-sm">Tambah Jadwal</a>
        </div>
    </div>

    <div class="container">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Fasilitas</th>
                    <th>Nama Pengguna</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>lapangan futsal</td>
                    <td>ferdi12</td>
                    <td>2024-02-20</td>
                    <td>12:00 - 13:00</td>
                    <td>
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
