<?php

class StringEqualsFileTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertStringEqualsFile('/var/www/html/GFL_PHP/task5/files/file.ini', 'five = 5\n');
    }
}