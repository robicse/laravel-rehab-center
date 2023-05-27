<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Urlredirect extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use HasFactory;
}
