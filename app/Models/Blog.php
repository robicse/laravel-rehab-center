<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    protected $dates = ['deleted_at'];
    use HasFactory; use SoftDeletes;
    protected $casts = [
        'created_at' =>  'datetime:dS F Y, H:i a'
         
     ];
}
