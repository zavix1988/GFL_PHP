<?php

class LessThanTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertLessThan(1, 2);
    }
}