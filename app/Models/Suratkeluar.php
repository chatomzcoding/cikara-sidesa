<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratkeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    protected $guarded = [];

    public function formatsurat()
    {
        return $this->belongsTo(Formatsurat::class);
    }
}
