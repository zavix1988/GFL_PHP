<?php

class XmlFileEqualsXmlFileTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertXmlFileEqualsXmlFile(
            '/var/www/html/GFL_PHP/task12/assets/file1.xml', '/var/www/html/GFL_PHP/task12/assets/file2.xml');
    }
}