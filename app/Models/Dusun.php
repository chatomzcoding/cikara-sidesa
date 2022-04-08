<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    protected $table = 'dusun';

    protected $guarded = [];

    public function rw()
    {
        return $this->hasMany(Rw::class);
    }

    public function rt()
    {
        return $this->hasManyThrough(Rt::class, Rw::class);
    }

    
}
