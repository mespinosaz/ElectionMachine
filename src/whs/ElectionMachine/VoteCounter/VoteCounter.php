<?php

namespace whs\ElectionMachine\VoteCounter;

use whs\ElectionMachine\Party\PartyCollection;
use whs\ElectionMachine\Vote\VoteCollection;
use whs\ElectionMachine\VoteCounter\Result\ElectionResult;

class VoteCounter
{
    private $partyCollection;

    public function __construct(PartyCollection $partyCollection)
    {
        $this->partyCollection = $partyCollection;
    }

    public function result(VoteCollection $voteCollection)
    {
        return new ElectionResult($this->partyCollection, $voteCollection);
    }
}
