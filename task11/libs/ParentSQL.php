<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 26.05.2019
 * Time: 20:32
 */

class ParentSQL
{
    protected $table;



    public function __construct() {
        $this->table ='';


    }

    public function setTable($table)
    {
        $this->table = trim($table);

    }

}