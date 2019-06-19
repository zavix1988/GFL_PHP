<?php

class XmlStringEqualsXmlStringTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertXmlStringEqualsXmlString(
            '<foo><bar/></foo>', '<foo><baz/></foo>');
    }
}