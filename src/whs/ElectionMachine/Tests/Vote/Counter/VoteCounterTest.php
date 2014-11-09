<?php

namespace whs\ElectionMachine\Tests\Vote\Counter;

require_once('autoload.php');

use whs\ElectionMachine\Vote\Counter\VoteCounter;
use whs\ElectionMachine\Party\PartyCollection;
use whs\ElectionMachine\Vote\VoteCollection;

class VoteTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $partyCollection = new PartyCollection();
        $counter = new VoteCounter($partyCollection);
        $this->assertInstanceOf('whs\ElectionMachine\Vote\Counter\VoteCounter', $counter);
    }

    public function testResult()
    {
        $partyCollection = new PartyCollection();
        $voteCollection = new VoteCollection();
        $counter = new VoteCounter($partyCollection);
        $result = $counter->result($voteCollection);
        $this->assertInstanceOf('whs\ElectionMachine\Vote\Counter\Result\ElectionResult', $result);
    }
}
