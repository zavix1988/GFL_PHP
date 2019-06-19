<?php

class GreatThanOrEqualTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertGreaterThanOrEqual(2, 3);
    }
}