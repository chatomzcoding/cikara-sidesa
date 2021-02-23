<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarakun extends Model
{
    use HasFactory;

    protected $table = 'daftar_akun';

    protected $fillable = ['kategoriakun_id','user_id','kode_akun','nama_akun','pos_saldo','pos_laporan','saldo_akun'];
}
