<x-app-layout title="edit voucher">
    @section('content-title')
        Form Edit Voucher
    @endsection

    <div class="container">
        <form action="{{ route('voucher.update', $voucher->id) }}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="kode_voucher">Kode Voucher</label>
                        <input type="text" name="kode_voucher" id="kode_voucher" class="form-control"
                            value="{{ old('kode_voucher', $voucher->kode_voucher) }}">
                        @error('kode_voucher')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_diskon">Jenis Diskon</label>
                        <select name="jenis_diskon" id="" class="form-control">
                            @if ($voucher->jenis_diskon == 'presentase')
                                <option value="presentase" selected>Presentase</option>
                                <option value="fixed">fixed</option>
                            @else
                                <option value="presentase">Presentase</option>
                                <option value="fixed" selected>fixed</option>
                            @endif
                        </select>
                        @error('jenis_diskon')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nilai_diskon">Nilai Diskon</label>
                        <input type="number" name="nilai_diskon" id="nilai_diskon" class="form-control"
                            value="{{ old('nilai_diskon', $voucher->nilai_diskon) }}">
                        @error('nilai_diskon')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kode_voucher">Tanggal Berlaku</label>
                        <div class="row">
                            <div class="col-md">
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                    value="{{ $voucher->tanggal_mulai }}">
                            </div>
                            <div class="col-md">
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                                    value="{{ $voucher->tanggal_selesai }}">
                            </div>
                            @error('tanggal_mulai')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="batas_penggunaan">Batas Penggunaan</label>
                        <input type="number" name="batas_penggunaan" id="batas_penggunaan" class="form-control"
                            value="{{ $voucher->batas_penggunaan }}">
                        @error('batas_penggunaan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="10" rows="2" class="form-control">{{ old('deskripsi', $voucher->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
