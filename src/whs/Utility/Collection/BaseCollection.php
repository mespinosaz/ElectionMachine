<?php

namespace whs\Utility\Collection;

class BaseCollection extends Collection
{
    public function add()
    {
        list($value) = func_get_args();
        $this->collection[] = $value;
    }
}
