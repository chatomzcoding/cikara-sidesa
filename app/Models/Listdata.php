<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listdata extends Model
{
    use HasFactory;

    protected $table = 'list_data';

    protected $guarded = [];

    public function formatsurat()
    {
        return $this->belongsTo(Formatsurat::class,'nama');
    }
}
