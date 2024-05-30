<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bukti Pembayaran</title>

    <style>
        .header {
            border-bottom: 1px solid black;
            padding: 7px;
        }

        .header .brand {
            font-size: 35px;
            font-weight: bold;
        }

        body {
            padding: 10px;
        }

        table {
            margin-bottom: 50px;
        }

        .tglcetak {
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="brand">SportRent</div>
        <div>jl ciledug raya no 69, Ciledug, Jakarta selatan 08123912312</div>
    </div>
    <div class="content">
        <small>Bukti Pembayaran</small>
        <table border="1" cellpadding="8" cellspacing="0">
            <caption>Detail Jadwal</caption>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Fasilitas</th>
                    <th>Waktu Booking</th>
                    <th>Tgl. Booking</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $pembayaran->jadwal->user->username }}</td>
                    <td>{{ $pembayaran->jadwal->fasilitas->nama_fasilitas }}</td>
                    <td>{{ $pembayaran->jadwal->waktu_mulai }} - {{ $pembayaran->jadwal->waktu_akhir }}</td>
                    <td>{{ $pembayaran->jadwal->tanggal }}</td>
                    <td>{{ number_format($pembayaran->jadwal->fasilitas->harga, '0', ',', '.') }}</td>
                </tr>
            </tbody>
        </table>


        <table border="1" cellpadding="8" cellspacing="0">
            <caption>Detail Pembayaran</caption>
            <thead>
                <tr>
                    <th>Invoice</th>
                    <th>Nama</th>
                    <th>Total Harga</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                    <th>Tgl. Bayar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $pembayaran->invoice }}</td>
                    <td>{{ $pembayaran->jadwal->user->username }}</td>
                    <td>{{ number_format($pembayaran->total, '0', ',', '.') }}</td>
                    <td>{{ $pembayaran->metode_pembayaran }}</td>
                    <td>{{ $pembayaran->status_pembayaran }}</td>
                    <td>{{ $pembayaran->tanggal_pembayaran }}</td>
                </tr>
            </tbody>
        </table>


    </div>
    <div class="tglcetak">Dicetak {{ $tanggal_cetak }}</div>
</body>

</html>
