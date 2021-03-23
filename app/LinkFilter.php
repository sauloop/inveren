<?php

namespace App;

use Illuminate\Support\Str;

class LinkFilter extends QueryFilter
{
    protected $aliases = [
        'date' => 'created_at', 'date-desc' => 'created_at-desc',
        'header' => 'title', 'header-desc' => 'title-desc',
        'cost' => 'price', 'cost-desc' => 'price-desc',
    ];

    public function rules(): array
    {
        return [
            'id' => 'filled',
            'search' => 'filled',
            'category_id' => 'exists:categories,id',
            'city_id' => 'exists:cities,id',
            'url' => 'filled',
            'order' => 'in:date,header,cost,date-desc,header-desc,cost-desc',
        ];
    }

    public function getColumnName($alias)
    {
        return $this->aliases[$alias] ?? $alias;
    }

    public function id($query, $id)
    {
        return $query->where('id', $id);
    }

    public function search($query, $search)
    {
        return $query->where('title', 'like', "%{$search}%");
    }

    public function categoryId($query, $type)
    {
        return $query->where('category_id', $type);
    }

    public function cityId($query, $city)
    {
        return $query->where('city_id', $city);
    }

    public function url($query, $url)
    {
        return $query->where('title', $url);
    }

    public function order($query, $value)
    {
        $value = $this->getColumnName($value);

        if (Str::endsWith($value, '-desc')) {
            $query->orderByDesc(Str::substr($value, 0, -5));
        } else {
            $query->orderBy($value);
        }
    }
}
