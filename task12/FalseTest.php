<?php

class FalseTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertFalse(TRUE);
    }
}