<?php

namespace whs\ElectionMachine;

use whs\ElectionMachine\Vote\VoteCollection;
use whs\ElectionMachine\Vote\Vote;
use whs\ElectionMachine\Census\Census;
use whs\ElectionMachine\Census\Participant\Participant;
use whs\ElectionMachine\Exception\ParticipantCannnotVoteException;

class ElectionMachine
{
    private $voteCollection;
    private $census;

    public function __construct(Census $census)
    {
        $this->voteCollection = new VoteCollection();
        $this->census = $census;
    }

    public function newVote(Vote $newVote, Participant $participant)
    {
        if (!$this->census->participantCanVote($participant)) {
            throw new ParticipantCannnotVoteException();
        }
        $this->voteCollection->add($newVote);
        $this->census->participantVoted($participant);
    }
}
