<?php

namespace mespinosaz\ElectionMachine\Census\Participant;

use mespinosaz\Utility\Collection\HashedCollection;

class ParticipantCollection extends HashedCollection
{
    /**
     * @param string $participantId
     * @return boolean
     */
    public function participantHasVoted($participantId)
    {
        return $this->collection[$participantId]->hasVoted();
    }

    /**
     * @param string $participantId
     */
    public function participantVoted($participantId)
    {
        $this->collection[$participantId]->voted();
    }
}
