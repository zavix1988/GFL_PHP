<?php

class ClassHasStaticAttributeTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertClassHasStaticAttribute('foo', 'stdClass');
    }
}