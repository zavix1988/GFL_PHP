<?php
class ArrayHasKeyTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertArrayHasKey('foo', array('bar' => 'baz'));
    }
}