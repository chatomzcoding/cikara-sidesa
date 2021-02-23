<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnalakun extends Model
{
    use HasFactory;

    protected $table = 'jurnal_akun';

    protected $guarded = [];

    public function daftarakun()
    {
    	return $this->hasOne(Daftarakun::class);
    }
}
