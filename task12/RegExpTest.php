<?php

class RegExpTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertRegExp('/foo/', 'bar');
    }
}