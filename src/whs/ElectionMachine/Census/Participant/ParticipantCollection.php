<?php

namespace whs\ElectionMachine\Census\Participant;

use whs\Utility\Collection\HashedCollection;

class ParticipantCollection extends HashedCollection
{
    public function participantHasVoted($participantId)
    {
        return $this->collection[$participantId]->hasVoted();
    }

    public function participantVoted($participantId)
    {
        $this->collection[$participantId]->voted();
    }
}
