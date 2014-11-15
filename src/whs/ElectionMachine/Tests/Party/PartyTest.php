<?php

namespace whs\ElectionMachine\Tests\Party;

use whs\ElectionMachine\Party\Party;

class PartyTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $Party = new Party(1);
        $this->assertInstanceOf('whs\ElectionMachine\Party\Party', $Party);
    }
}
