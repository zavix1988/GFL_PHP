<?php

class EmptyTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertEmpty(array('foo'));
    }
}