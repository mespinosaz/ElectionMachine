<?php

namespace whs\ElectionMachine\Vote;

class Vote
{
    private $party;

    public function __construct($partyId)
    {
        $this->party = $partyId;
    }
}