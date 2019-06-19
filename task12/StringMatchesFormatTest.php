<?php

class StringMatchesFormatTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertStringMatchesFormat('%i', 'foo');
    }
}