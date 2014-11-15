<?php

namespace whs\ElectionMachine\Tests\Census\Participant;

use whs\ElectionMachine\ElectionMachine;
use whs\ElectionMachine\Vote\Vote;
use whs\ElectionMachine\Census\Participant\Participant;
use whs\ElectionMachine\Census\Participant\ParticipantCollection;
use whs\ElectionMachine\Census\Census;

class ElectionMachineTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $participant = new Participant('test');
        $this->assertInstanceOf('whs\ElectionMachine\Census\Participant\Participant', $participant);
    }

    public function testVoted()
    {
        $participant = new Participant('test');
        $this->assertFalse($participant->hasVoted());
        $participant->voted();
        $this->assertTrue($participant->hasVoted());
    }
}
