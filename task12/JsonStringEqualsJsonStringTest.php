<?php

class JsonStringEqualsJsonStringTest extends PHPUnit\Framework\TestCase
{
    public function testFailure()
    {
        $this->assertJsonStringEqualsJsonString(
            json_encode(array("Mascot" => "Tux")), json_encode(array("Mascott" => "ux"))
        );
    }
}