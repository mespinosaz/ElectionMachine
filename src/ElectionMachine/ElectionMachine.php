<?php

namespace mespinosaz\ElectionMachine;

use mespinosaz\ElectionMachine\Vote\VoteCollection;
use mespinosaz\ElectionMachine\Vote\Vote;
use mespinosaz\ElectionMachine\Census\Census;
use mespinosaz\ElectionMachine\Census\Participant\Participant;
use mespinosaz\ElectionMachine\Exception\ParticipantCannnotVoteException;
use mespinosaz\ElectionMachine\Party\PartyCollection;
use mespinosaz\ElectionMachine\VoteCounter\VoteCounter;

class ElectionMachine
{
    private $voteCollection;
    private $census;
    private $voteCounter;

    public function __construct(Census $census, PartyCollection $partyCollection)
    {
        $this->voteCollection = new VoteCollection();
        $this->census = $census;
        $this->voteCounter = new VoteCounter($partyCollection, $census);
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
