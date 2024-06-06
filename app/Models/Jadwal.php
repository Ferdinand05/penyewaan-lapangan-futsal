<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $fillable = ['id_lapangan', 'user_id', 'total_harga', 'tanggal', 'waktu_mulai', 'waktu_akhir', 'status', 'harga'];


    public function fasilitas(): BelongsTo
    {
        return $this->belongsTo(Fasilitas::class, 'id_lapangan', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the pembayaran associated with the Jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pembayaran(): HasOne
    {
        return $this->hasOne(Pembayaran::class, 'id_jadwal', 'id');
    }
}
