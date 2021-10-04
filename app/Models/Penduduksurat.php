<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduksurat extends Model
{
    protected $table = 'penduduk_surat';

    protected $guarded = [];
    use HasFactory;
}
