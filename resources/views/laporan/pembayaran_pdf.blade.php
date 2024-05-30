<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Laporan Pembayaran - PDF</title>
    <style>
        body {
            padding: 10px
        }

        table {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <small>Dicetak {{ $tanggal_cetak }}</small><br>
    <small>Jumlah Data : {{ $pembayaran->count() }}</small>
    <table border="1" cellspacing="0" cellpadding="5">
        <caption>Laporan Pembayaran</caption>
        <thead>
            <tr>
                <th>No</th>
                <th>Invoice</th>
                <th>Nama</th>
                <th>Waktu Sewa</th>
                <th>Total</th>
                <th>Tgl. Bayar</th>
                <th>Metode Bayar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            $totalPemasukan = 0;
            ?>
            @foreach ($pembayaran as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->invoice }}</td>
                    <td>{{ $p->jadwal->user->username }}</td>
                    <td>{{ $p->jadwal->waktu_mulai }} - {{ $p->jadwal->waktu_akhir }}</td>
                    <td>{{ number_format($p->total, '0', ',', '.') }}</td>
                    <td>{{ $p->tanggal_pembayaran }}</td>
                    <td>{{ $p->metode_pembayaran }}</td>
                    <td>{{ $p->status_pembayaran }}</td>
                </tr>

                <?php
                $totalPemasukan += $p->total;
                ?>
            @endforeach

            <tr>
                <td colspan="2">Total Pembayaran : </td>
                <td colspan="6" style="text-align: center">{{ number_format($totalPemasukan, '0', ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
