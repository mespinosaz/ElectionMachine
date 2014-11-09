<?php

namespace whs\ElectionMachine\Tests\Vote\Counter\Result;

require_once('autoload.php');

use whs\ElectionMachine\Vote\Counter\Result\ElectionResult;
use whs\ElectionMachine\Party\PartyCollection;
use whs\ElectionMachine\Vote\VoteCollection;
use whs\ElectionMachine\Party\Party;
use whs\ElectionMachine\Vote\Vote;

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

        $this->result = new ElectionResult($partyCollection, $voteCollection);
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('whs\ElectionMachine\Vote\Counter\Result\ElectionResult', $this->result);
    }

    public function testPercentage()
    {
        $this->assertEquals($this->result->percentageOfParty(new Party('ABCD')), 40);
        $this->assertEquals($this->result->percentageOfParty(new Party('JAQN')), 20);
        $this->assertEquals($this->result->percentageOfParty(new Party('OAJS')), 10);
        $this->assertEquals($this->result->percentageOfParty(new Party('LBIH')), 0);
        $this->assertEquals($this->result->percentageOfNull(), 30);
    }
}
