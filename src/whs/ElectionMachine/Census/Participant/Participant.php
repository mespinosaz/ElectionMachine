<?php

namespace whs\ElectionMachine\Census\Participant;

class Participant
{
    private $participantId;
    private $hasVoted;

    public function __construct($participantId)
    {
        $this->participantId = $participantId;
        $this->hasVoted = false;
    }

    public function id()
    {
        return $this->participantId;
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
