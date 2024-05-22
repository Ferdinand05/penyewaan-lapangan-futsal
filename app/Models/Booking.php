<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $fillable = ['user_id', 'id_lapangan', 'tanggal_booking', 'waktu_mulai', 'waktu_akhir', 'total_harga', 'status'];
}
