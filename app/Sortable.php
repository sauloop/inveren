<?php

namespace App;

use Illuminate\Support\Arr;

class Sortable
{
    protected $currentUrl;
    protected $currentColumn;
    protected $currentDirection;
    protected $query = [];

    public function __construct($currentUrl)
    {
        $this->currentUrl = $currentUrl;
    }

    public function appends(array $query)
    {
        $this->query = $query;
    }

    public function setCurrentOrder($order, $direction = 'asc')
    {
        $this->currentColumn = $order;
        $this->currentDirection = $direction;
    }

    public function url($column)
    {
        if ($this->isSortingBy($column)) {
            return $this->buildSortableUrl("{$column}-desc");
        }

        return $this->buildSortableUrl($column);
    }

    public function buildSortableUrl($order)
    {
        return $this->currentUrl . '?' . Arr::query(array_merge($this->query, ['order' => $order]));
    }

    public function classes($column)
    {
        if ($this->isSortingBy($column)) {
            return 'fas fa-sort-up';
        }

        if ($this->isSortingBy("{$column}-desc")) {
            return 'fas fa-sort-down';
        }

        return 'fas fa-sort';
    }

    protected function isSortingBy($column)
    {
        return $this->currentColumn == $column;
    }
}
