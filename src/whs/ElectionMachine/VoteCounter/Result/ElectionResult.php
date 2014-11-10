<?php

namespace whs\ElectionMachine\VoteCounter\Result;

use whs\ElectionMachine\Party\PartyCollection;
use whs\ElectionMachine\Vote\VoteCollection;
use whs\ElectionMachine\Party\Party;
use whs\ElectionMachine\Census\Census;

class ElectionResult
{
    const NULL_PARTY_ID = -1;

    private $results;
    private $numberOfParticipants;

    public function __construct(PartyCollection $partyCollection, Census $census, VoteCollection $voteCollection)
    {
        $this->results = array();
        $this->initializeResults($partyCollection);
        $this->computeResults($voteCollection);
        $this->computeNumberOfParticipants($census);
    }

    private function computeNumberOfParticipants(Census $census)
    {
        $this->numberOfParticipants = $census->numberOfParticipants();
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
        return ($this->results[$identifier]/$this->numberOfParticipants)*100;
    }

    private function partyExists(Party $party)
    {
        return in_array($party->id(), array_keys($this->results));
    }

    public function percentageOfAbstinence()
    {
        return 100 * ( $this->numberOfParticipants - $this->getTotalVotes() ) / $this->numberOfParticipants;
    }

    private function getTotalVotes()
    {
        $total = 0;
        foreach ($this->results as $value) {
            $total += $value;
        }
        return $total;
    }

}
