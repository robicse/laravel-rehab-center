<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory; use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
