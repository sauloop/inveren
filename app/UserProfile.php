<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id', 'city_id', 'company_name', 'address', 'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
