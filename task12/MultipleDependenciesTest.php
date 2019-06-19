<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 19.06.19
 * Time: 10:09
 */

class MultipleDependenciesTest extends PHPUnit\Framework\TestCase
{
    public function testProducerFirst()
    {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer()
    {
        $this->assertEquals(
            array('first', 'second'),
            func_get_args()
        );
    }
}