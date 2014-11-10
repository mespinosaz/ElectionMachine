<?php

namespace whs\ElectionMachine\Tests;

require_once('autoload.php');

use whs\ElectionMachine\ElectionMachine;
use whs\ElectionMachine\Vote\Vote;
use whs\ElectionMachine\Census\Participant\Participant;
use whs\ElectionMachine\Census\Participant\ParticipantCollection;
use whs\ElectionMachine\Census\Census;
use whs\ElectionMachine\Party\Party;
use whs\ElectionMachine\Party\PartyCollection;

class ElectionMachineTest extends \PHPUnit_Framework_TestCase
{
    private $defaultMachine;

    protected function setUp()
    {
        $census = $this->setupCensus();
        $partyCollection = new PartyCollection();
        $partyCollection->add('ABCD', new Party('ABCD'));
        $partyCollection->add('JAQN', new Party('JAQN'));
        $partyCollection->add('OAJS', new Party('OAJS'));
        $partyCollection->add('LBIH', new Party('LBIH'));
        $this->defaultMachine = new ElectionMachine($census, $partyCollection);
    }

    private function setupCensus()
    {
        $participants = $this->setupParticipants();
        return new Census($participants);
    }

    private function setupParticipants()
    {
        $participants = new ParticipantCollection();
        $participants->add('1234A', new Participant('1234A'));
        $participants->add('1234B', new Participant('1234B'));
        $participants->add('1234C', new Participant('1234C'));
        $participants->add('1234D', new Participant('1234D'));
        $participants->add('1234E', new Participant('1234E'));
        $participants->add('1234F', new Participant('1234F'));
        $participants->add('1234G', new Participant('1234G'));
        $participants->add('1234H', new Participant('1234H'));
        $participants->add('1234I', new Participant('1234I'));
        $participants->add('1234J', new Participant('1234J'));

        return $participants;
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('whs\ElectionMachine\ElectionMachine', $this->defaultMachine);
    }

    public function testNewVote()
    {
        $vote = new Vote(new Party('test'));
        $participant = new Participant('1234A');
        $participant2 = new Participant('1234B');
        $this->defaultMachine->newVote($vote, $participant);
        $this->defaultMachine->newVote($vote, $participant2);
        $this->assertTrue(true);
    }

    /**
     * @expectedException whs\ElectionMachine\Exception\ParticipantCannnotVoteException
     */
    public function testInvalidParticipantVote()
    {
        $vote = new Vote(new Party('test'));
        $participant = new Participant('11111111A');
        $this->defaultMachine->newVote($vote, $participant);
    }

    /**
     * @expectedException whs\ElectionMachine\Exception\ParticipantCannnotVoteException
     */
    public function testDoubleInvalidVote()
    {
        $vote = new Vote(new Party('test'));
        $participant = new Participant('1234A');
        $participant2 = new Participant('1234B');
        $this->defaultMachine->newVote($vote, $participant);
        $this->defaultMachine->newVote($vote, $participant2);
        $this->defaultMachine->newVote($vote, $participant);
    }

    public function testResults()
    {
        $results = $this->defaultMachine->result();
        $this->assertInstanceOf('whs\ElectionMachine\VoteCounter\Result\ElectionResult', $results);
    }
}
