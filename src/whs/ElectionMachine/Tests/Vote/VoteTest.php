<?php

namespace whs\tests\ElectionMachine\Vote;

require_once('autoload.php');

use whs\ElectionMachine\Vote\Vote;

class VoteTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $vote = new Vote(1);
        $this->assertInstanceOf('whs\ElectionMachine\Vote\Vote', $vote);
    }
}
