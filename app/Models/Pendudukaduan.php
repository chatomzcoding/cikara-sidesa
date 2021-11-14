<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendudukaduan extends Model
{
    use HasFactory;

    protected $table = 'penduduk_aduan';
    
    protected $fillable = ['user_id','key','isi','status'];
}
