<?php

namespace whs\ElectionMachine\Census\Participant;

use whs\Utility\ObjectTemplate\IdentifiedObject;

class Participant extends IdentifiedObject
{
    private $hasVoted;

    public function __construct($identifier)
    {
        parent::__construct($identifier);
        $this->hasVoted = false;
    }

    public function hasVoted()
    {
        return $this->hasVoted;
    }

    public function voted()
    {
        $this->hasVoted = true;
    }
}
