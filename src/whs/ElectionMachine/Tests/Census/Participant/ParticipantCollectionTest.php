<?php

namespace whs\tests\ElectionMachine\Census\Participant;

use whs\ElectionMachine\Census\Participant\Participant;
use whs\ElectionMachine\Census\Participant\ParticipantCollection;

class ParticipantCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $participants = new ParticipantCollection();
        $this->assertInstanceOf('whs\ElectionMachine\Census\Participant\ParticipantCollection', $participants);
    }

    public function testAdd()
    {
        $participant = new Participant('test');
        $participants = new ParticipantCollection();
        $participants->add($participant->id(), $participant);
        $this->assertTrue($participants->exists($participant->id()));
    }

    public function testVoted()
    {
        $participant = new Participant('test');
        $participants = new ParticipantCollection();
        $participants->add($participant->id(), $participant);
        $this->assertFalse($participants->participantHasVoted($participant->id()));
        $participants->participantVoted($participant->id());
        $this->assertTrue($participants->participantHasVoted($participant->id()));
    }
}
