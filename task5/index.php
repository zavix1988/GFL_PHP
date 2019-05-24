<?php
include 'config.inc.php';
include 'libs/interfaces/iWorkData.php';
include 'libs/Sessions.php';
include 'libs/Cookies.php';
include 'libs/MySQL.php';
include 'libs/JSON.php';
include 'libs/Ini.php';
include 'libs/functions.php';


$objArr = array(
    'Sessions',
    'Cookies',
    'MySQL',
    'JSON',
    'Ini'
);

$key = 'newKey';
$value = 'newValue';

foreach($objArr as $item) {
    ${$item.'Obj'} = new $item();
    saveData(${$item.'Obj'}, $key, $value);
    ${$item.'Data'} = getData(${$item.'Obj'}, $key);
    if (deleteData(${$item.'Obj'}, $key)) {
        ${$item.'DelMes'} = "Variable {$key} deleted in $item";
    }
}
//var_dump($MySQLObj->getSql());



include 'templates/index.tpl.php';
