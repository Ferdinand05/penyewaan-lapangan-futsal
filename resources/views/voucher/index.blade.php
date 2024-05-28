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
                <td>Tanggal</td>
                <td>Batas Penggunaan</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>


</x-app-layout>
