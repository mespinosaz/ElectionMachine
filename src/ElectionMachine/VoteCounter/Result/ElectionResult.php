<?php

namespace mespinosaz\ElectionMachine\VoteCounter\Result;

use mespinosaz\ElectionMachine\Party\PartyCollection;
use mespinosaz\ElectionMachine\Vote\VoteCollection;
use mespinosaz\ElectionMachine\Party\Party;
use mespinosaz\ElectionMachine\Census\Census;

class ElectionResult
{
    const NULL_PARTY_ID = -1;

    /**
     * @param array $results
     */
    private $results;

    /**
     * @param int $numberOfParticipants
     */
    private $numberOfParticipants;

    /**
     * @param PartyCollection $partyCollection
     * @param Census $census
     * @param VoteCollection $voteCollection
     */
    public function __construct(PartyCollection $partyCollection, Census $census, VoteCollection $voteCollection)
    {
        $this->results = array();
        $this->initializeResults($partyCollection);
        $this->computeResults($voteCollection);
        $this->computeNumberOfParticipants($census);
    }

    /**
     * @param Census $census
     */
    private function computeNumberOfParticipants(Census $census)
    {
        $this->numberOfParticipants = $census->numberOfParticipants();
    }

    /**
     * @param PartyCollection $partyCollection
     */
    private function initializeResults(PartyCollection $partyCollection)
    {
        $this->results[self::NULL_PARTY_ID] = 0;
        foreach ($partyCollection->getIdentifiers() as $identfier) {
            $this->results[$identfier] = 0;
        }
    }

    /**
     * @param VoteCollection $voteCollection
     */
    private function computeResults(VoteCollection $voteCollection)
    {
        for ($i=0; $i<$voteCollection->size(); $i++) {
            $party = $voteCollection->get($i)->readParty();
            $partyId = self::NULL_PARTY_ID;

            if ($this->partyExists($party)) {
                $partyId = $party->getId();
            }

            $this->results[$partyId]++;
        }
    }

    /**
     * @param Party $party
     * @return float
     */
    public function percentageOfParty(Party $party)
    {
        return $this->percentageOfPartyByIdentifier($party->getId());
    }

    /**
     * @return float
     */
    public function percentageOfNull()
    {
        return $this->percentageOfPartyByIdentifier(self::NULL_PARTY_ID);
    }

    /**
     * @param string $identifier
     * @return float
     */
    private function percentageOfPartyByIdentifier($identifier)
    {
        return ($this->results[$identifier]/$this->numberOfParticipants)*100;
    }

    /**
     * @param Party $party
     * @return boolean
     */
    private function partyExists(Party $party)
    {
        return in_array($party->getId(), array_keys($this->results));
    }

    /**
     * @return float
     */
    public function percentageOfAbstinence()
    {
        return 100 * ( $this->numberOfParticipants - $this->getTotalVotes() ) / $this->numberOfParticipants;
    }

    /**
     * @return int
     */
    private function getTotalVotes()
    {
        $total = 0;
        foreach ($this->results as $value) {
            $total += $value;
        }
        return $total;
    }
}
