<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Jadwal Booking - PDF</title>


    <style>
        body {
            padding: 10px;
        }

        table {
            margin-top: 10px;
        }
    </style>

</head>

<body>
    <small>Dicetak {{ $tanggal_cetak }}</small><br>
    <small>Jumlah Data : {{ $jadwal->count() }}</small>
    <table border="1" cellspacing="0" cellpadding="5">
        <caption>Laporan Jadwal</caption>
        <thead>
            <tr>
                <td>No.</td>
                <td>Fasilitas</td>
                <td>Pengguna</td>
                <td>Tgl Booking</td>
                <td>Waktu Booking</td>
                <td>Status</td>
                <td>Total Harga</td>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            $total = 0;
            ?>
            @foreach ($jadwal as $j)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $j->fasilitas->nama_fasilitas }}</td>
                    <td>{{ $j->user->username }}</td>
                    <td>{{ $j->tanggal }}</td>
                    <td>{{ $j->waktu_mulai }} - {{ $j->waktu_akhir }}</td>
                    <td>{{ $j->status }}</td>
                    <td>{{ number_format($j->total_harga, '0', ',', '.') }}</td>
                </tr>

                <?php $total += $j->total_harga; ?>
            @endforeach
            <tr>
                <td colspan="4">Total : </td>
                <td colspan="3" style="text-align: center">{{ number_format($total, '0', ',', '.') }}</td>
            </tr>
        </tbody>
    </table>



</body>

</html>
