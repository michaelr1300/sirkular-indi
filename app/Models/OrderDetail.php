<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class OrderDetail extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function package()
    {
        return $this->hasOne('App\Models\Package');
    }
}
