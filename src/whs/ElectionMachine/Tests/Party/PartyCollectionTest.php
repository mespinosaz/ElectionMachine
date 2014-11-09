<?php

namespace whs\ElectionMachine\Tests\Party;

use whs\ElectionMachine\Party\Party;
use whs\ElectionMachine\Party\PartyCollection;

class PartyCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $Partys = new PartyCollection();
        $this->assertInstanceOf('whs\ElectionMachine\Party\PartyCollection', $Partys);
    }

    public function testAdd()
    {
        $party = new Party('test');
        $collection = new PartyCollection();
        $collection->add('test', $party);
        $this->assertTrue($collection->exists($party->id()));
    }
}
