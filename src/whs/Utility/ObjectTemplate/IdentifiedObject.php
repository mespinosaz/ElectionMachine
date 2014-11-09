<?php

namespace whs\Utility\ObjectTemplate;

class IdentifiedObject
{
    private $identifier;

    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    public function id()
    {
        return $this->identifier;
    }
}
