<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantUser extends Model
{
    protected $fillable = [
        'restaurant_id',
        'user_id',
        'role',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
