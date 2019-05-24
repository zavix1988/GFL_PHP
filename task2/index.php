<?php
include 'config.inc.php';
include 'libs/Calc.php';

$myCalc = new Calc();

$myCalc->setFirstVar(-3);
$myCalc->setSecondVar(+5);
$var1 = $myCalc->getFirstVar();
$var2 = $myCalc->getSecondVar();
$sum = $myCalc->addVars();
$sub = $myCalc->substructVars();
$multip = $myCalc->multiplicateVars();
$diviz = $myCalc->DivizVars();
$negativ = $myCalc->negateVar();
$sqrt = $myCalc->sqrtVar();
$oneDiv = $myCalc->oneDivizVar();
$myCalc->memoryAdd();
$myCalc->memoryAdd();
$memory1 = $myCalc->memoryGet();
$myCalc->memorySubstruct();
$memory2 = $myCalc->memoryGet();
$myCalc->clearMemory();
$memory3 = $myCalc->memoryGet();


include 'templates/index.tpl.php';