<?php

class StringEndsWithTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertStringEndsWith('suffix', 'foo');
    }
}