<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function orderDetail()
    {
        return $this->belongsToMany('App\Models\OrderDetail');
    }
}
