<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 19.06.19
 * Time: 10:14
 */

class DataTest extends PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider provider
     */
    public function testAdd($a, $b, $c)
    {
        $this->assertEquals($c, $a + $b);
    }

    public function provider()
    {
        return array(
            array(0, 0, 0),
            array(0, 1, 1),
            array(1, 0, 1),
            array(1, 1, 3)
        );
    }
}