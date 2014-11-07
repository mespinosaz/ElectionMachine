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
        $votes[] = $vote;
    }
}
