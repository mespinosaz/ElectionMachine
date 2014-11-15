<?php

namespace whs\ElectionMachine\Tests\Vote;

use whs\ElectionMachine\Vote\VoteCollection;
use whs\ElectionMachine\Vote\Vote;
use whs\ElectionMachine\Party\Party;

class VoteCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $votes = new VoteCollection();
        $this->assertInstanceOf('whs\ElectionMachine\Vote\VoteCollection', $votes);
    }

    public function testAdd()
    {
        $votes = new VoteCollection();
        $newVote = new Vote(new Party('test'));

        $this->assertEquals(0, $votes->size());
        $votes->add($newVote);
        $this->assertEquals(1, $votes->size());
    }
}
