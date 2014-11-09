<?php

namespace whs\Utility\Collection;

abstract class Collection
{
    protected $collection;

    public function __construct()
    {
        $this->collection = array();
    }

    abstract public function add();

    public function get($key)
    {
        return $this->collection[$key];
    }

    public function size()
    {
        return count($this->collection);
    }
}
