<?php

namespace mespinosaz\ElectionMachine\Tests\Census\Participant;

use mespinosaz\ElectionMachine\ElectionMachine;
use mespinosaz\ElectionMachine\Vote\Vote;
use mespinosaz\ElectionMachine\Census\Participant\Participant;
use mespinosaz\ElectionMachine\Census\Participant\ParticipantCollection;
use mespinosaz\ElectionMachine\Census\Census;

class ElectionMachineTest extends \PHPUnit_Framework_TestCase
{
    public function testVoted()
    {
        $participant = new Participant('test');
        $this->assertFalse($participant->hasVoted());
        $participant->voted();
        $this->assertTrue($participant->hasVoted());
    }
}
