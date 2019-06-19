<?php

class XmlStringEqualsXmlFileTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertXmlStringEqualsXmlFile(
            '/var/www/html/GFL_PHP/task12/assets/file1.xml', '<from>Katya</from>');
    }
}