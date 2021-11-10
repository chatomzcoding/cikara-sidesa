<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userakses extends Model
{
    use HasFactory;

    protected $table = 'user_akses';

    protected $guarded = [];
}
