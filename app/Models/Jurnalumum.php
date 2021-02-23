<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnalumum extends Model
{
    use HasFactory;

    protected $table = 'jurnal_umum';

    protected $guarded = [];

    public function listakun(){
        //setiap profil memiliki satu mahasiswa
        return $this->hasMany(Jurnalakun::class);
    }

    public function jurnalakunpembantu()
    {
    	return $this->hasOne(Jurnalakunpembantu::class);
    }
   
}
