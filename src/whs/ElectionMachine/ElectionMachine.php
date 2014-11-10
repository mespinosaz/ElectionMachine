<?php

namespace whs\ElectionMachine;

use whs\ElectionMachine\Vote\VoteCollection;
use whs\ElectionMachine\Vote\Vote;
use whs\ElectionMachine\Census\Census;
use whs\ElectionMachine\Census\Participant\Participant;
use whs\ElectionMachine\Exception\ParticipantCannnotVoteException;
use whs\ElectionMachine\Party\PartyCollection;
use whs\ElectionMachine\VoteCounter\VoteCounter;

class ElectionMachine
{
    private $voteCollection;
    private $census;
    private $voteCounter;

    public function __construct(Census $census, PartyCollection $partyCollection)
    {
        $this->voteCollection = new VoteCollection();
        $this->census = $census;
        $this->voteCounter = new VoteCounter($partyCollection);
    }

    public function newVote(Vote $newVote, Participant $participant)
    {
        if (!$this->census->participantCanVote($participant)) {
            throw new ParticipantCannnotVoteException();
        }
        $this->voteCollection->add($newVote);
        $this->census->participantVoted($participant);
    }

    public function result()
    {
        return $this->voteCounter->result($this->voteCollection);
    }
}
