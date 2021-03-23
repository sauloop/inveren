<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{

    use HasFactory;

    protected $fillable = ['name'];

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function profiles()
    {
        return $this->hasMany(UserProfile::class);
    }
}
