<?php

class TrueTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertTrue(FALSE);
    }
}