<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forumdiskusi extends Model
{
    protected $table = 'forum_diskusi';

    protected $guarded = [];
    use HasFactory;
}
