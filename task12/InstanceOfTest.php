<?php

class InstanceOfTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertInstanceOf('RuntimeException', new Exception);
    }
}