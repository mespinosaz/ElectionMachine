<?php

namespace whs\ElectionMachine\Vote;

use whs\ElectionMachine\Party\Party;

class Vote
{
    private $party;

    public function __construct(Party $party)
    {
        $this->party = $party;
    }

    public function readParty()
    {
        return $this->party;
    }
}
