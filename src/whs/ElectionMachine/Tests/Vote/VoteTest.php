<?php

namespace whs\tests\ElectionMachine\Vote;

require_once('autoload.php');

use whs\ElectionMachine\Vote\Vote;
use whs\ElectionMachine\Party\Party;

class VoteTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $vote = new Vote(new Party('test'));
        $this->assertInstanceOf('whs\ElectionMachine\Vote\Vote', $vote);
    }

    public function testRead()
    {
        $partyId = 'test';
        $party = new Party($partyId);
        $vote = new Vote($party);
        $this->assertEquals($partyId, $vote->readParty()->id());
    }
}
