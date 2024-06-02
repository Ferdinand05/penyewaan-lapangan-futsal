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
            border-bottom: 1px solid black;
            padding: 7px;
        }

        .body {
            border-bottom: 1px solid black;
            padding: 7px;
        }

        .brand {
            font-size: 30px;
            font-weight: bold;
        }

        .text {
            margin-bottom: 4px;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="brand">SportRent</div>
        <div>
            jl ciledug raya no 69, Ciledug, Jakarta selatan
            08123912312
        </div>
    </div>
    <br>
    <div class="body">
        <div class="text">Tanggal Booking : {{ $booking->tanggal_booking }}</div>
        <div class="text">
            Nama : {{ $booking->user->username }}
        </div>
        <div class="text">
            Telepon : {{ $booking->user->no_telp }}
        </div>
        <div class="text">
            Fasilitas : {{ $booking->fasilitas->nama_fasilitas }} - {{ $booking->fasilitas->tipe_fasilitas }}
        </div>

        <div class="text">
            Waktu : {{ $booking->waktu_mulai }} - {{ $booking->waktu_akhir }}
        </div>
        <div class="text">
            Total Harga : {{ number_format($booking->total_harga, '0', ',', '.') }}
        </div>
        <br>
    </div>


    <div class="footer">
        <br>
        <div>
            <i>
                *Note :
                <ul>
                    <li>Harap tunjukkan Resi ini kepada admin. Maksimal 15 menit sebelum waktu penyewaan</li>
                    <li>Pembatalan dapat dilakukan dihalaman Profile</li>
                    <li>Jika ada pertanyaan bisa hubungi ke nomor 08123123(Admin)</li>
                </ul>
            </i>

        </div>
        <br>
        <div style="text-align: center">
            <small>
                Dicetak pada {{ $tanggal_cetak }}
            </small>
        </div>
    </div>
</body>

</html>
