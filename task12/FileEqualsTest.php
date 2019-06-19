<?php

class FileEqualsTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertFileEquals('/var/www/html/GFL_PHP/task4/config.inc.php', '/var/www/html/GFL_PHP/task10/config.inc.php');
    }
}