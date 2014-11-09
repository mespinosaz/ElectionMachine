<?php

namespace whs\ElectionMachine\Vote;

class VoteCollection
{
    private $votes;

    public function __construct()
    {
        $this->votes = array();
    }

    public function add(Vote $vote)
    {
        $this->votes[] = $vote;
    }

    public function size()
    {
        return count($this->votes);
    }
}
