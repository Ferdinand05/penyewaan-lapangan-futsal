<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $fillable = ['user_id', 'id_lapangan', 'tanggal_booking', 'waktu_mulai', 'waktu_akhir', 'total_harga', 'status'];


    /**
     * Get the booking that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the lapangan that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fasilitas(): BelongsTo
    {
        return $this->belongsTo(Fasilitas::class, 'id_lapangan', 'id');
    }
}
