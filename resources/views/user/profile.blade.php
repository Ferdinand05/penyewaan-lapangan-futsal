@include('layouts.header', ['title' => $user->username])

<div class="container">
    <div class="mt-5">
        <a href="{{ route('home') }}" class="btn btn-sm btn-danger">Kembali</a>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <small>Profile</small><br>
            <h1>{{ $user->username }}</h1>
            <h3>{{ $user->email }}</h3>
            <h6>Account created {{ $user->created_at->toFormattedDateString() }}</h6>
        </div>
        <div class="card-body">
            <h4>User Booking</h4>
            <div class="d-flex">
                @foreach ($userBooking as $b)
                    <div class="card">
                        <div class="card-header">
                            {{ $b->tanggal_booking }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
