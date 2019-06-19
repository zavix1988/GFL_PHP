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
include 'libs/Books.php';





$books = new Books();

$books->id = '2';
var_dump($books->id);
include 'templates/index.tpl.php';