<?php

namespace whs\ElectionMachine\Census;

use whs\ElectionMachine\Census\Participant\ParticipantCollection;
use whs\ElectionMachine\Census\Participant\Participant;

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
        return $this->participants->exists($participant);
    }

    private function participantHasVoted(Participant $participant)
    {
        return $this->participants->participantHasVoted($participant);
    }

    public function participantVoted(Participant $participant)
    {
        $this->participants->participantVoted($participant);
    }
}
