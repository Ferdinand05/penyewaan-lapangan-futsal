<x-app-layout title="Create Voucher">
    @section('content-title')
        Form Create Voucher
    @endsection


    <div class="container">
        <form action="{{ route('voucher.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="kode_voucher">Kode Voucher</label>
                        <input type="text" name="kode_voucher" id="kode_voucher" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kode_voucher">Jenis Diskon</label>
                        <select name="" id="" class="form-control">
                            <option disabled selected>Pilih Jenis Voucher</option>
                            <option value="presentase">Presentase</option>
                            <option value="fixed">fixed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai_diskon">Nilai Diskon</label>
                        <input type="number" name="nilai_diskon" id="nilai_diskon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kode_voucher">Tanggal Berlaku</label>
                        <div class="row">
                            <div class="col-md">
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
                            </div>
                            <div class="col-md">
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="batas_penggunaan">Batas Penggunaan</label>
                        <input type="number" name="batas_penggunaan" id="batas_penggunaan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="10" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
