<?php

namespace App;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

abstract class QueryFilter
{
    protected $valid;

    abstract public function rules(): array;

    public function applyTo($query, array $filters)
    {
        $rules = $this->rules();

        $validator = Validator::make(array_intersect_key($filters, $rules), $rules);

        $this->valid = $validator->valid();

        foreach ($this->valid() as $name => $value) {
            $this->applyFilter($query, $name, $value);
        }

        return $query;
    }

    protected function applyFilter($query, $name, $value)
    {
        $method = Str::camel($name);

        if (method_exists($this, $method)) {
            $this->$method($query, $value);
        }
    }

    public function valid()
    {
        return $this->valid;
    }
}
