<?php

namespace mespinosaz\ElectionMachine\Census;

use mespinosaz\ElectionMachine\Census\Participant\ParticipantCollection;
use mespinosaz\ElectionMachine\Census\Participant\Participant;

class Census
{
    private $participants;

    public function __construct(ParticipantCollection $participants)
    {
        $this->participants = $participants;
    }

    public function participantCanVote(Participant $participant)
    {
        return $this->participantInCensus($participant)
            && !$this->participantHasVoted($participant);
    }

    private function participantInCensus(Participant $participant)
    {
        return $this->participants->exists($participant->getId());
    }

    private function participantHasVoted(Participant $participant)
    {
        return $this->participants->participantHasVoted($participant->getId());
    }

    public function participantVoted(Participant $participant)
    {
        $this->participants->participantVoted($participant->getId());
    }

    public function numberOfParticipants()
    {
        return $this->participants->size();
    }
}
