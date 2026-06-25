<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $guarded = []; // Mengizinkan insert data ke semua kolom

    // Menyambungkan Rental ke Loker
    public function locker()
    {
        return $this->belongsTo(Locker::class);
    }
}
