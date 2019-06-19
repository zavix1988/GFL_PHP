<?php

class CountTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertCount(0, array('foo'));
    }
}