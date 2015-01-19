<?php

namespace mespinosaz\ElectionMachine\Tests\Vote;

use mespinosaz\ElectionMachine\Vote\VoteCollection;
use mespinosaz\ElectionMachine\Vote\Vote;
use mespinosaz\ElectionMachine\Party\Party;

class VoteCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $votes = new VoteCollection();
        $newVote = new Vote(new Party('test'));

        $this->assertEquals(0, $votes->size());
        $votes->add($newVote);
        $this->assertEquals(1, $votes->size());
    }
}
