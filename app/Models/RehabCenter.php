<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RehabCenter extends Model
{
    use HasFactory; use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $casts = [
        'created_at' =>  'datetime:d M Y H:m',
        
    ];
    public function user(){
        return $this->belongsTo(User::class,'created_by_user_id','id');
    }
    public function rehabslider(){
        return $this->hasMany(RehabSlider::class,'rehab_center');
    }
    public function rehabreview(){
        return $this->hasMany(RehabReview::class,'rehab_center')->wherestatus(1);
    }
}
