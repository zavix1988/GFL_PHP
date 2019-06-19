<?php

class SameTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertSame('2204', 2204);
    }
}