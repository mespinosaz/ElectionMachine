<?php

namespace mespinosaz\ElectionMachine\Census\Participant;

use mespinosaz\Utility\ObjectTemplate\IdentifiedObject;

class Participant extends IdentifiedObject
{
    /**
     * @var boolean $hasVoted
     */
    private $hasVoted;

    /**
     * @param string $identifier
     */
    public function __construct($identifier)
    {
        parent::__construct($identifier);
        $this->hasVoted = false;
    }

    /**
     * @return boolean
     */
    public function hasVoted()
    {
        return $this->hasVoted;
    }

    public function voted()
    {
        $this->hasVoted = true;
    }
}
