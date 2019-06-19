<?php

class LessThanOrEqualTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertLessThanOrEqual(1, 2);
    }
}