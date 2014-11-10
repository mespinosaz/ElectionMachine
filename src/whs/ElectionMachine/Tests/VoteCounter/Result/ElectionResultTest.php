<?php

namespace whs\ElectionMachine\Tests\VoteCounter\Result;

require_once('autoload.php');

use whs\ElectionMachine\VoteCounter\Result\ElectionResult;
use whs\ElectionMachine\Party\PartyCollection;
use whs\ElectionMachine\Vote\VoteCollection;
use whs\ElectionMachine\Party\Party;
use whs\ElectionMachine\Vote\Vote;
use whs\ElectionMachine\Census\Participant\Participant;
use whs\ElectionMachine\Census\Participant\ParticipantCollection;
use whs\ElectionMachine\Census\Census;

class ElectionResultTest extends \PHPUnit_Framework_TestCase
{
    private $result;

    protected function setUp()
    {
        $partyABCD = new Party('ABCD');
        $partyJAQN = new Party('JAQN');
        $partyOAJS = new Party('OAJS');
        $partyLBIH = new Party('LBIH');
        $partyNull = new Party('INVALID PARTY');
        $partyNull2 = new Party(-1);
        $partyCollection = new PartyCollection();
        $partyCollection->add('ABCD', $partyABCD);
        $partyCollection->add('JAQN', $partyJAQN);
        $partyCollection->add('OAJS', $partyOAJS);
        $partyCollection->add('LBIH', $partyLBIH);

        $voteCollection = new VoteCollection();
        $voteCollection->add(new Vote($partyABCD));
        $voteCollection->add(new Vote($partyNull));
        $voteCollection->add(new Vote($partyOAJS));
        $voteCollection->add(new Vote($partyJAQN));
        $voteCollection->add(new Vote($partyNull));
        $voteCollection->add(new Vote($partyABCD));
        $voteCollection->add(new Vote($partyABCD));
        $voteCollection->add(new Vote($partyNull2));
        $voteCollection->add(new Vote($partyABCD));
        $voteCollection->add(new Vote($partyJAQN));

        $census = $this->setupCensus();

        $this->result = new ElectionResult($partyCollection, $census, $voteCollection);
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
        $participants->add('1234K', new Participant('1234K'));
        $participants->add('1234L', new Participant('1234L'));
        $participants->add('1234M', new Participant('1234M'));
        $participants->add('1234N', new Participant('1234N'));
        $participants->add('1234O', new Participant('1234O'));
        $participants->add('1234P', new Participant('1234P'));
        $participants->add('1234Q', new Participant('1234Q'));
        $participants->add('1234R', new Participant('1234R'));
        $participants->add('1234S', new Participant('1234S'));
        $participants->add('1234T', new Participant('1234T'));
        return $participants;
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('whs\ElectionMachine\VoteCounter\Result\ElectionResult', $this->result);
    }

    public function testPercentage()
    {
        $this->assertEquals($this->result->percentageOfParty(new Party('ABCD')), 20);
        $this->assertEquals($this->result->percentageOfParty(new Party('JAQN')), 10);
        $this->assertEquals($this->result->percentageOfParty(new Party('OAJS')), 5);
        $this->assertEquals($this->result->percentageOfParty(new Party('LBIH')), 0);
        $this->assertEquals($this->result->percentageOfNull(), 15);
        $this->assertEquals($this->result->percentageOfAbstinence(), 50);
    }
}
