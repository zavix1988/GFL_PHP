<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 19.06.19
 * Time: 10:03
 */

class DependencyFailureTest extends PHPUnit\Framework\TestCase
{
    public function testOne()
    {
        $this->assertTrue(FALSE);
    }

    /**
     * @depends testOne
     */
    public function testTwo()
    {
    }
}