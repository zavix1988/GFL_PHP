<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 26.05.2019
 * Time: 20:29
 */

include 'config.inc.php';
include 'libs/ParentSQL.php';
include 'libs/SQLPDO.php';





$bazadan = new SQLPDO();
$bazadan->setTable('books');
var_dump($bazadan->setTable('books')->setField(['name', 'slug']));

































include 'templates/index.tpl.php';