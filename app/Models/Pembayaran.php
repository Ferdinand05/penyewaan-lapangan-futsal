<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = ['invoice', 'id_jadwal', 'tanggal_pembayaran', 'total', 'metode_pembayaran', 'status_pembayaran'];


    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id');
    }
}
