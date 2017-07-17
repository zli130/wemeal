<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
