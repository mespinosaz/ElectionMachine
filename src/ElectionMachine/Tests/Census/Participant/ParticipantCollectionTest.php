<?php

namespace mespinosaz\ElectionMachine\Tests\Census\Participant;

use mespinosaz\ElectionMachine\Census\Participant\Participant;
use mespinosaz\ElectionMachine\Census\Participant\ParticipantCollection;

class ParticipantCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $participant = new Participant('test');
        $participants = new ParticipantCollection();
        $participants->add($participant->getId(), $participant);
        $this->assertTrue($participants->exists($participant->getId()));
    }

    public function testVoted()
    {
        $participant = new Participant('test');
        $participants = new ParticipantCollection();
        $participants->add($participant->getId(), $participant);
        $this->assertFalse($participants->participantHasVoted($participant->getId()));
        $participants->participantVoted($participant->getId());
        $this->assertTrue($participants->participantHasVoted($participant->getId()));
    }
}
