<?php

session_start();

include 'config.inc.php';
include 'libs/ReadWrite.php';

$readWriteFile = new ReadWrite;


$beforeString = $readWriteFile->getString(3);
$readWriteFile->setString(3, 'Hello, world!!!');
$afterString = $readWriteFile->getString(3);
$beforeSymbol = $readWriteFile->getSymbol(6, 1);
$readWriteFile->setSymbol(6, 1, 'h');
$afterSymbol = $readWriteFile->getSymbol(6, 1);




include 'templates/index.tpl.php';
