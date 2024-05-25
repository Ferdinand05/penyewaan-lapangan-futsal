@include('layouts.header', ['title' => 'Detail Fasilitas'])
<div class="containter p-5">
    <div class="card">
        <div class="card-header">

            <h4>{{ $fasilitas->nama_fasilitas }}</h4>
            <h5>Tipe {{ $fasilitas->tipe_fasilitas }}</h5>
        </div>
        <div class="card-body">

            <img src="\storage\image-fasilitas/{{ $fasilitas->gambar_fasilitas }}" alt="" class="img-fluid">
            <br>
            <br>
            <p>Harga : {{ number_format($fasilitas->harga, '0', ',', '.') }} /Jam</p>
            Deskripsi :
            <p>{{ $fasilitas->deskripsi }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('home') }}" class="btn btn-danger">Kembali</a>
            <a href="{{ route('booking.create', 'fasilitas=' . $fasilitas->id) }}" class="btn btn-primary">Booking</a>
        </div>
    </div>
</div>



@include('layouts.footer')
