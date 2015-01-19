<?php

namespace mespinosaz\ElectionMachine\Tests\Vote;

use mespinosaz\ElectionMachine\Vote\Vote;
use mespinosaz\ElectionMachine\Party\Party;

class VoteTest extends \PHPUnit_Framework_TestCase
{
    public function testRead()
    {
        $partyId = 'test';
        $party = new Party($partyId);
        $vote = new Vote($party);
        $this->assertEquals($partyId, $vote->readParty()->getId());
    }
}
