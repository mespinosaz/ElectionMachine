<?php

namespace mespinosaz\ElectionMachine\Vote;

use mespinosaz\ElectionMachine\Party\Party;

class Vote
{
    /**
     * @var Party $party
     */
    private $party;

    /**
     * @param Party $party
     */
    public function __construct(Party $party)
    {
        $this->party = $party;
    }

    /**
     * @return Party
     */
    public function readParty()
    {
        return $this->party;
    }
}
