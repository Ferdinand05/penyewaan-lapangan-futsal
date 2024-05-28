<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'voucher';
    protected $fillable = ['kode_voucher', 'deskripsi', 'jenis_diskon', 'nilai_diskon', 'tanggal_mulai', 'tanggal_selesai', 'batas_penggunaan', 'jumlah_penggunaan'];
}
