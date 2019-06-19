<?php

class GreaterThanTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertGreaterThan(2, 1);
    }
}