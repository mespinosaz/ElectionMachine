<?php

namespace whs\ElectionMachine\Census\Participant;

class ParticipantCollection
{
    private $participants;

    public function __construct()
    {
        $this->participants = array();
    }

    public function add(Participant $participant)
    {
        $this->participants[$participant->id()] = $participant;
    }

    public function exists(Participant $participant)
    {
        return !empty($this->participants[$participant->id()]);
    }

    public function participantHasVoted(Participant $participant)
    {
        return $this->participants[$participant->id()]->hasVoted();
    }

    public function participantVoted(Participant $participant)
    {
        $this->participants[$participant->id()]->voted();
    }
}
