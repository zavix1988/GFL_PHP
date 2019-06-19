<?php

class NullTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertNull('foo');
    }
}