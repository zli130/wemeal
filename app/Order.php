<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function orderer()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
