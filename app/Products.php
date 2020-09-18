<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded=[];
    
    public function seller()
    {
        return $this->belongsTo(User::class);
    }
    public function productoffer()
    {
        return $this->hasMany(Offers::class , 'idofprod');
    }
}

