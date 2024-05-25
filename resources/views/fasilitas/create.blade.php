<x-app-layout title="Tambah fasilitas">
    @section('content-title')
        Form Tambah fasilitas
    @endsection



    <div class="row">
        <div class="col-md-7">
            <form action="{{ route('fasilitas.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_fasilitas" class="form-label">Nama fasilitas</label>
                    <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control">
                    @error('nama_fasilitas')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tipe_fasilitas" class="form-label">Tipe fasilitas</label>
                    <select name="tipe_fasilitas" id="tipe_fasilitas" class="form-control">
                        <option value="" selected disabled>Pilih Tipe fasilitas</option>
                        <option value="Outdoor">Outdoor</option>
                        <option value="Indoor">Indoor</option>
                    </select>
                    @error('tipe_fasilitas')
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
                    <label for="gambar_fasilitas" class="form-label">Gambar</label>
                    <input type="file" class="form-control" name="gambar_fasilitas">
                    @error('gambar_fasilitas')
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
