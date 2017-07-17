<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name', 'description', 'active', 'image', 'address', 'phone', 'owner'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'active', 'created_at', 'updated_at'
    ];

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    public function caregories()
    {
        return $this->hasMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
