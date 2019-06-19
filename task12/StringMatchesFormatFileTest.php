<?php

class StringMatchesFormatFileTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertStringMatchesFormatFile('/var/www/html/GFL_PHP/task1/files/server.js', 'foo');
    }
}