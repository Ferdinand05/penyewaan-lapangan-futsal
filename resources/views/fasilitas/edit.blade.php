<x-app-layout title="Edit Fasilitas">
    @section('content-title')
        Form Edit Fasilitas <code>{{ $fasilitas->nama_fasilitas }}</code>
    @endsection

    <div class="row">
        <div class="col-md-7">
            <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="nama_fasilitas" class="form-label">Nama fasilitas</label>
                    <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control"
                        value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}">
                    @error('nama_fasilitas')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tipe_fasilitas" class="form-label">Tipe fasilitas</label>
                    <select name="tipe_fasilitas" id="tipe_fasilitas" class="form-control">

                        @if ($fasilitas->tipe_fasilitas == 'Outdoor')
                            <option value="Outdoor" selected>Outdoor</option>
                            <option value="Indoor">Indoor</option>
                        @else
                            <option value="Outdoor">Outdoor</option>
                            <option value="Indoor" selected>Indoor</option>
                        @endif

                    </select>
                    @error('tipe_fasilitas')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga" class="form-label">Harga per Jam</label>
                    <input type="number" name="harga" id="harga" class="form-control"
                        value="{{ old('harga', $fasilitas->harga) }}">
                    @error('harga')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi">{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
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
