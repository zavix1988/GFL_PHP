<?php

class ContainsOnlyTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertContainsOnly('string', array('1', '2', 3));
    }
}