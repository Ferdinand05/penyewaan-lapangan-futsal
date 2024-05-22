<x-app-layout title="Tambah Lapangan">
    @section('content-title')
        Form Tambah Lapangan
    @endsection



    <div class="row">
        <div class="col-md-7">
            <form action="{{ route('lapangan.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_lapangan" class="form-label">Nama Lapangan</label>
                    <input type="text" name="nama_lapangan" id="nama_lapangan" class="form-control">
                    @error('nama_lapangan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tipe_lapangan" class="form-label">Tipe Lapangan</label>
                    <select name="tipe_lapangan" id="tipe_lapangan" class="form-control">
                        <option value="" selected disabled>Pilih Tipe Lapangan</option>
                        <option value="rumput sintetis">Rumput Sintetis</option>
                        <option value="karpet">Karpet</option>
                        <option value="vinyl">Vinyl</option>
                    </select>
                    @error('tipe_lapangan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga" class="form-label">Harga per Jam</label>
                    <input type="number" name="harga" id="harga" class="form-control">
                    @error('harga')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi"></textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar_lapangan" class="form-label">Gambar</label>
                    <input type="file" class="form-control" name="gambar_lapangan">
                    @error('gambar_lapangan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
