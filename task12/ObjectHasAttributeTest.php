<?php

class ObjectHasAttributeTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertObjectHasAttribute('foo', new stdClass);
    }
}