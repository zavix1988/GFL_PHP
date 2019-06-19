<?php

class JsonStringEqualsJsonFileTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertJsonStringEqualsJsonFile(
            '/var/www/html/GFL_PHP/task5/files/file.json', json_encode(array("name" =>"John"))
        );
    }
}