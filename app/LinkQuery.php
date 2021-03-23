<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

class LinkQuery extends Builder
{
    public function findByCategory($category_id)
    {
        return Category::find($category_id)->links;
    }

    public function findByCity($city_id)
    {
        return City::find($city_id)->links;
    }
}
