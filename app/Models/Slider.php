<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    protected $dates = ['deleted_at'];
    use HasFactory;
}
