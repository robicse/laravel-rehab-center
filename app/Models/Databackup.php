<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Databackup extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' =>  'datetime:d M Y H:m',
        
    ];

}
