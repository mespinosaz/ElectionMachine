<?php

namespace whs\ElectionMachine\VoteCounter\Result;

use whs\ElectionMachine\Party\PartyCollection;
use whs\ElectionMachine\Vote\VoteCollection;
use whs\ElectionMachine\Party\Party;

class ElectionResult
{
    const NULL_PARTY_ID = -1;

    private $results;

    public function __construct(PartyCollection $partyCollection, VoteCollection $voteCollection)
    {
        $this->results = array();
        $this->initializeResults($partyCollection);
        $this->computeResults($voteCollection);
    }

    private function initializeResults(PartyCollection $partyCollection)
    {
        $this->results[self::NULL_PARTY_ID] = 0;
        foreach ($partyCollection->getIdentifiers() as $identfier) {
            $this->results[$identfier] = 0;
        }
    }

    private function computeResults(VoteCollection $voteCollection)
    {
        for ($i=0; $i<$voteCollection->size(); $i++) {
            $party = $voteCollection->get($i)->readParty();
            $partyId = self::NULL_PARTY_ID;

            if ($this->partyExists($party)) {
                $partyId = $party->id();
            }

            $this->results[$partyId]++;
        }
    }

    public function percentageOfParty(Party $party)
    {
        return $this->percentageOfPartyByIdentifier($party->id());
    }

    public function percentageOfNull()
    {
        return $this->percentageOfPartyByIdentifier(self::NULL_PARTY_ID);
    }

    private function percentageOfPartyByIdentifier($identifier)
    {
        return ($this->results[$identifier]/$this->getTotalVotes())*100;
    }

    public function getTotalVotes()
    {
        $total = 0;
        foreach ($this->results as $value) {
            $total += $value;
        }

        return $total;
    }

    private function partyExists(Party $party)
    {
        return in_array($party->id(), array_keys($this->results));
    }
}
