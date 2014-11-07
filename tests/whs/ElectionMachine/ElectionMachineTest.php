<?php

namespace whs\tests\ElectionMachine;

require_once('autoload.php');

use whs\ElectionMachine\ElectionMachine;
use whs\ElectionMachine\Vote\Vote;
use whs\ElectionMachine\Census\Participant\Participant;
use whs\ElectionMachine\Census\Participant\ParticipantCollection;
use whs\ElectionMachine\Census\Census;

class ElectionMachineTest extends \PHPUnit_Framework_TestCase
{
    private $defaultMachine;
    protected function setUp()
    {
        $census = $this->setupCensus();
        $this->defaultMachine = new ElectionMachine($census);
    }

    private function setupCensus()
    {
        $participants = $this->setupParticipants();
        return new Census($participants);
    }

    private function setupParticipants()
    {
        $participants = new ParticipantCollection();
        $participants->add(new Participant('1234A'));
        $participants->add(new Participant('1234B'));
        $participants->add(new Participant('1234C'));
        $participants->add(new Participant('1234D'));
        $participants->add(new Participant('1234E'));

        return $participants;
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('whs\ElectionMachine\ElectionMachine', $this->defaultMachine);
    }

    public function testNewVote()
    {
        $vote = new Vote(1);
        $participant = new Participant('1234A');
        $participant2 = new Participant('1234B');
        $this->defaultMachine->newVote($vote, $participant);
        $this->defaultMachine->newVote($vote, $participant2);
    }

    /**
     * @expectedException whs\ElectionMachine\Exception\ParticipantCannnotVoteException
     */
    public function testInvalidParticipantVote()
    {
        $vote = new Vote(1);
        $participant = new Participant('11111111A');
        $this->defaultMachine->newVote($vote, $participant);
    }

    /**
     * @expectedException whs\ElectionMachine\Exception\ParticipantCannnotVoteException
     */
    public function testDoubleInvalidVote()
    {
        $vote = new Vote(1);
        $participant = new Participant('1234A');
        $participant2 = new Participant('1234B');
        $this->defaultMachine->newVote($vote, $participant);
        $this->defaultMachine->newVote($vote, $participant2);
        $this->defaultMachine->newVote($vote, $participant);
    }
}
