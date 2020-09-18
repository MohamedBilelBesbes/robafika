<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    public function useroffer()
    {
        return $this->belongsTo(User::class);
    }
    public function productoffer()
    {
        return $this->belongsTo(Products::class);
    }
}
