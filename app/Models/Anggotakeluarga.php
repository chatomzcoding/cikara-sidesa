<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggotakeluarga extends Model
{
    use HasFactory;

    protected $table = 'anggota_keluarga';

    protected $guarded = [];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }
}
