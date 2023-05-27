<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Databackup extends Model
{
    use HasFactory; use SoftDeletes;
    protected $casts = [
        'created_at' =>  'datetime:d M Y H:m',
        
    ];

}
