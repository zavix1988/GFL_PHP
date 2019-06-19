<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 19.06.19
 * Time: 11:19
 */

class FileExistsTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertFileExists('/var/www/html/GFL_PHP/task4/config.inc.php');
    }
}