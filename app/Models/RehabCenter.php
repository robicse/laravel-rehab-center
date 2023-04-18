<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RehabCenter extends Model
{
    use HasFactory;
    public function rehabcenter(){
        return $this->hasMany(RehabSlider::class,'rehab_center');
    }
}
