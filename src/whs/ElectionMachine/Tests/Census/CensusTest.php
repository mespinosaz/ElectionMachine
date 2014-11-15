<?php

namespace whs\ElectionMachine\Tests\Census;

use whs\ElectionMachine\Census\Participant\Participant;
use whs\ElectionMachine\Census\Participant\ParticipantCollection;
use whs\ElectionMachine\Census\Census;

class CensusTest extends \PHPUnit_Framework_TestCase
{
    private function setupParticipants()
    {
        $participants = new ParticipantCollection();
        $participants->add('1234A', new Participant('1234A'));
        $participants->add('1234B', new Participant('1234B'));
        $participants->add('1234C', new Participant('1234C'));
        $participants->add('1234D', new Participant('1234D'));
        $participants->add('1234E', new Participant('1234E'));

        return $participants;
    }

    public function testConstructor()
    {
        $participants = new ParticipantCollection();
        $census = new Census($participants);
        $this->assertInstanceOf('whs\ElectionMachine\Census\Census', $census);
    }

    public function testCanVote()
    {
        $participants = $this->setupParticipants();
        $census = new Census($participants);
        $participantInCensus = new Participant('1234A');
        $participantNotInCensus = new Participant('ABCD');
        $this->assertTrue($census->participantCanVote($participantInCensus));
        $this->assertFalse($census->participantCanVote($participantNotInCensus));
        $census->participantVoted($participantInCensus);
        $this->assertFalse($census->participantCanVote($participantInCensus));
    }

    public function testNumberOfParticipants()
    {
        $participants = $this->setupParticipants();
        $census = new Census($participants);
        $this->assertEquals($census->numberOfParticipants(), 5);
    }
}
