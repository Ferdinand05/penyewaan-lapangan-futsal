<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Booking</title>

    <style>
        .header {
            border-bottom: 1px solid black
        }

        .body {
            border-bottom: 1px solid black
        }
    </style>
</head>

<body>

    <div class="header">
        <h3>SportRent</h3>
        <p>
            jl ciledug raya no 69, Ciledug, Jakarta selatan
        </p>
    </div>
    <br>
    <br>
    <div class="body">
        <div>
            Nama : {{ $booking->user->username }}
        </div>
        <div>
            Fasilitas : {{ $boo }}
        </div>
        <div>
            Waktu : {{ $booking->waktu_mulai }} - {{ $booking->waktu_akhir }}
        </div>
        <div>
            Total Harga : {{ $booking->total_harga }}
        </div>
    </div>

</body>

</html>
