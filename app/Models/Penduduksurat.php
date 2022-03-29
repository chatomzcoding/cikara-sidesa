<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduksurat extends Model
{
    use HasFactory;
    protected $table = 'penduduk_surat';

    protected $guarded = [];

    public function formatsurat()
    {
        return $this->belongsTo(Formatsurat::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function userakses()
    {
        return $this->belongsTo(Userakses::class,'user_id');
    }
}
