<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 19.06.19
 * Time: 14:47
 */

class Books extends SQLPDO
{
    private $data;

    public function __construct()
    {
        parent::__construct();


        $this->data = [];


        $this->setTable('books');

        $result = $this->query('SHOW COLUMNS FROM books');


        foreach ($result as $fields){
            $field = $fields['Field'];
            $this->data[$field] = '1';
        }


    }



}