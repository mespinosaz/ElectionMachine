<?php

namespace mespinosaz\ElectionMachine\Tests\Party;

use mespinosaz\ElectionMachine\Party\Party;
use mespinosaz\ElectionMachine\Party\PartyCollection;

class PartyCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $party = new Party('test');
        $collection = new PartyCollection();
        $collection->add('test', $party);
        $this->assertTrue($collection->exists($party->getId()));
    }
}
