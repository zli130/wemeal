<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function provider()
    {
        return $this->hasOne(Provider::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
