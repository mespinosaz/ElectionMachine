<?php

namespace whs\ElectionMachine\Tests\VoteCounter;

require_once('autoload.php');

use whs\ElectionMachine\VoteCounter\VoteCounter;
use whs\ElectionMachine\Party\PartyCollection;
use whs\ElectionMachine\Vote\VoteCollection;
use whs\ElectionMachine\Census\Participant\ParticipantCollection;
use whs\ElectionMachine\Census\Census;

class VoteTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $partyCollection = new PartyCollection();
        $participantsCollection = new ParticipantCollection();
        $census = new Census($participantsCollection);
        $counter = new VoteCounter($partyCollection, $census);
        $this->assertInstanceOf('whs\ElectionMachine\VoteCounter\VoteCounter', $counter);
    }

    public function testResult()
    {
        $partyCollection = new PartyCollection();
        $voteCollection = new VoteCollection();
        $participantsCollection = new ParticipantCollection();
        $census = new Census($participantsCollection);
        $counter = new VoteCounter($partyCollection, $census);
        $result = $counter->result($voteCollection);
        $this->assertInstanceOf('whs\ElectionMachine\VoteCounter\Result\ElectionResult', $result);
    }
}
