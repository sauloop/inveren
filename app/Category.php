<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    use HasFactory;

    protected $fillable = ['name'];

    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
