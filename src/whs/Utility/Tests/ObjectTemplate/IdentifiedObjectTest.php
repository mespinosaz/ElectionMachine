<?php

namespace whs\Utility\Tests\ObjectTemplate;

require_once('autoload.php');

use whs\Utility\ObjectTemplate\IdentifiedObject;

class HashedCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $object = new IdentifiedObject('id');
        $this->assertInstanceOf('whs\Utility\ObjectTemplate\IdentifiedObject', $object);
    }

    public function testId()
    {
        $id =  'test_id';
        $object = new IdentifiedObject($id);
        $this->assertEquals($id, $object->id());
    }
}
