<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class RehabReview extends Model
{
    use HasFactory;
   
    protected $casts = [
        'created_at' =>  'datetime:d M Y H:m',
        
    ];

    public function rehabcenter(){
        return $this->belongsTo(RehabCenter::class,'rehab_center');
    }
}
