<?php

namespace whs\tests\ElectionMachine\Vote;

require_once('autoload.php');

use whs\ElectionMachine\Vote\VoteCollection;
use whs\ElectionMachine\Vote\Vote;

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
        $newVote = new Vote(1);

        $this->assertEquals(0, $votes->size());
        $votes->add($newVote);
        $this->assertEquals(1, $votes->size());
    }
}
