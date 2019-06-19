<?php

class StringStartsWithTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertStringStartsWith('prefix', 'foo');
    }
}