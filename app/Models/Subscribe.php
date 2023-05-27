<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscribe extends Model
{
    use SoftDeletes;
    use HasFactory;  
    protected $dates = ['deleted_at'];
    protected $casts = [
        'created_at' =>  'datetime:dS F Y, H:i a'
         
     ];
}
