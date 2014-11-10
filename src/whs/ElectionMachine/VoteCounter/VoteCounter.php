<?php

namespace whs\ElectionMachine\VoteCounter;

use whs\ElectionMachine\Party\PartyCollection;
use whs\ElectionMachine\Vote\VoteCollection;
use whs\ElectionMachine\VoteCounter\Result\ElectionResult;
use whs\ElectionMachine\Census\Census;

class VoteCounter
{
    private $partyCollection;
    private $census;

    public function __construct(PartyCollection $partyCollection, Census $census)
    {
        $this->partyCollection = $partyCollection;
        $this->census = $census;
    }

    public function result(VoteCollection $voteCollection)
    {
        return new ElectionResult($this->partyCollection, $this->census, $voteCollection);
    }
}
