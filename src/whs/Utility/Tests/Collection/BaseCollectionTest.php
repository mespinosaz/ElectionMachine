<?php

namespace whs\Utility\Tests\Collection;

require_once('autoload.php');

use whs\Utility\Collection\BaseCollection;

class BaseCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $collection = new BaseCollection();
        $this->assertInstanceOf('whs\Utility\Collection\BaseCollection', $collection);
    }

    public function testAdd()
    {
        $collection = new BaseCollection();

        $this->assertEquals(0, $collection->size());
        $collection->add(1);
        $this->assertEquals(1, $collection->size());
    }

    public function testGet()
    {
        $originalElement = '123';
        $collection = new BaseCollection();
        $collection->add($originalElement);
        $element = $collection->get(0);
        $this->assertEquals($element, $element);
    }
}
