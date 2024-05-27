<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $fillable = ['id_lapangan', 'user_id', 'total_harga', 'tanggal', 'waktu_mulai', 'waktu_akhir', 'status'];
}
