<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 19.06.19
 * Time: 10:21
 */

require 'assets/CsvFileIterator.php';

class DataTest2 extends PHPUnit\Framework\TestCase
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
        return new CsvFileIterator('assets/data.csv');
    }
}