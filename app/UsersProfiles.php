<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersProfiles extends Model
{
    protected $guarded=[];

    public function userprofile()
    {
        return $this->belongsTo(User::class);
    }
}
