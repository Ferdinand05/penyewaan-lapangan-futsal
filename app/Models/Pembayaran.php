<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = ['invoice', 'id_booking', 'tanggal_pembayaran', 'total', 'metode_pembayaran', 'status_pembayaran'];
}
