<?php

namespace mespinosaz\ElectionMachine\Tests\VoteCounter;

use mespinosaz\ElectionMachine\VoteCounter\VoteCounter;
use mespinosaz\ElectionMachine\Party\PartyCollection;
use mespinosaz\ElectionMachine\Vote\VoteCollection;
use mespinosaz\ElectionMachine\Census\Participant\ParticipantCollection;
use mespinosaz\ElectionMachine\Census\Census;

class VoteTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $partyCollection = new PartyCollection();
        $participantsCollection = new ParticipantCollection();
        $census = new Census($participantsCollection);
        $counter = new VoteCounter($partyCollection, $census);
        $this->assertInstanceOf('mespinosaz\ElectionMachine\VoteCounter\VoteCounter', $counter);
    }

    public function testResult()
    {
        $partyCollection = new PartyCollection();
        $voteCollection = new VoteCollection();
        $participantsCollection = new ParticipantCollection();
        $census = new Census($participantsCollection);
        $counter = new VoteCounter($partyCollection, $census);
        $result = $counter->result($voteCollection);
        $this->assertInstanceOf('mespinosaz\ElectionMachine\VoteCounter\Result\ElectionResult', $result);
    }
}
