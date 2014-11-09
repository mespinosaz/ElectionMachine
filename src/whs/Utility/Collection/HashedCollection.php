<?php

namespace whs\Utility\Collection;

class HashedCollection extends Collection
{
    public function add()
    {
        list($key, $value) = func_get_args();
        $this->collection[$key] = $value;
    }

    public function getIdentifiers()
    {
        return array_keys($this->collection);
    }

    public function exists($identifier)
    {
        return !empty($this->collection[$identifier]);
    }
}
