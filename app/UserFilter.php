<?php

namespace App;

use Illuminate\Support\Str;

class UserFilter extends QueryFilter
{
    protected $aliases = [
        'header' => 'name', 'header-desc' => 'name-desc',
    ];

    public function rules(): array
    {
        return [
            'id' => 'filled',
            'search' => 'filled',
            'email' => 'filled',
            'admin' => 'filled',
            'order' => 'in:header,header-desc',
        ];
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

    public function getColumnName($alias)
    {
        return $this->aliases[$alias] ?? $alias;
    }

    public function id($query, $id)
    {
        if (empty($id)) {
            return;
        }

        $query->where('id', $id);
    }

    public function search($query, $name)
    {
        if (empty($name)) {
            return;
        }

        $query->where('name', 'like', "%{$name}%");
    }

    public function email($query, $email)
    {
        if (empty($email)) {
            return;
        }

        $query->where('email', 'like', "%{$email}%");
    }

    public function admin($query, $admin)
    {
        if (empty($admin)) {
            return;
        }

        $query->where('admin', $admin);
    }
}
