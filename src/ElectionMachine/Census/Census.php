<?php

namespace mespinosaz\ElectionMachine\Census;

use mespinosaz\ElectionMachine\Census\Participant\ParticipantCollection;
use mespinosaz\ElectionMachine\Census\Participant\Participant;

class Census
{
    /**
     * @var ParticipantCollection $participants
     */
    private $participants;

    /**
     * @param ParticipantCollection $participants
     */
    public function __construct(ParticipantCollection $participants)
    {
        $this->participants = $participants;
    }

    /**
     * @param Participant $participant
     * @return boolean
     */
    public function participantCanVote(Participant $participant)
    {
        return $this->participantInCensus($participant)
            && !$this->participantHasVoted($participant);
    }

    /**
     * @param Participant $participant
     * @return boolean
     */
    private function participantInCensus(Participant $participant)
    {
        return $this->participants->exists($participant->getId());
    }

    /**
     * @param Participant $participant
     * @return boolean
     */
    private function participantHasVoted(Participant $participant)
    {
        return $this->participants->participantHasVoted($participant->getId());
    }

    /**
     * @param Participant $participant
     */
    public function participantVoted(Participant $participant)
    {
        $this->participants->participantVoted($participant->getId());
    }

    /**
     * @return int
     */
    public function numberOfParticipants()
    {
        return $this->participants->size();
    }
}
