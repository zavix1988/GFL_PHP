<?php

class ArrayDiffTest extends PHPUnit\Framework\TestCase
{
    public function testEquality() {
        $this->assertEquals(
            array(1,2,3 ,4,5,6),
            array(1,2,33,4,5,6)
        );
    }
}