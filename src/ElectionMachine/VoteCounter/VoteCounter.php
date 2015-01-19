<?php

namespace mespinosaz\ElectionMachine\VoteCounter;

use mespinosaz\ElectionMachine\Party\PartyCollection;
use mespinosaz\ElectionMachine\Vote\VoteCollection;
use mespinosaz\ElectionMachine\VoteCounter\Result\ElectionResult;
use mespinosaz\ElectionMachine\Census\Census;

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
