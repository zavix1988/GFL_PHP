<?php

class ClassHasAttributeTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertClassHasAttribute('foo', 'stdClass');
    }
}