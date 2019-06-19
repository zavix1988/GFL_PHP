<?php
class ExceptionTest extends PHPUnit\Framework\TestCase
{
    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
    }
}