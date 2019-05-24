<?php

include 'config.inc.php';
include 'libs/ParentSQL.php';
include 'libs/MySQL.php';
include 'libs/PgSQL.php';

$myConnection = new MySQL();

$myConnection->setTable('books');
//insert
$myConnection->setValue('name', 'Assembler for AVR32 для чайников');
$myConnection->setValue('slug', 'assember-dlya-chainikov');
$myConnection->setValue('price', '250');
$myConnection->setValue('pubyear', '2019');
$myConnection->setValue('lang', 'RUS');
$myConnection->setValue('description', 'дичь');
$myValues = $myConnection->getValues();

$myInsert = $myConnection->insertRow();
$insertMyQuery = $myConnection->getQuery();

//select
$myConnection->setField('*');
$myConnection->setField('name');
$myConnection->setField('slug');
$myConnection->setField('price');
$myConnection->setField('pubyear');
$myConnection->setField('lang');
$myConnection->setField('description');
$mySelectFields = $myConnection->getFields('decription');

$myConnection->setWhere("lang = 'RUS'");
$mySelectConditions = $myConnection->getWhere();

$myConnection->setLimit(9);
$mySelect = $myConnection->selectRows();

$selectMyQuery = $myConnection->getQuery();

//update
$myConnection->setValue('name', 'Assembler for AVR32 для чайников');
$myConnection->setValue('slug', 'assember-dlya-chainikov');
$myConnection->setValue('price', '250');
$myConnection->setValue('pubyear', '2019');
$myConnection->setValue('lang', 'RUS');
$myConnection->setValue('description', 'дикая дичь');
$myUpdateValues = $myConnection->getValues();

$myConnection->setWhere("name = 'Assembler for AVR32 для чайников'");
$myUpdateConditions = $myConnection->getWhere();

$myUpdate = $myConnection->updateRow();
$updateMyQuery = $myConnection->getQuery();

//delete
$myConnection->setWhere("name = 'Assembler for AVR32 для чайников'");
$myDeleteConditions = $myConnection->getWhere();

$myDelete = $myConnection->deleteRow();
$deleteMyQuery = $myConnection->getQuery();


$pgConnection = new PgSQL();

$pgConnection->setTable('books');
//insert
$pgConnection->setValue('name', 'Assembler for AVR32 для чайников');
$pgConnection->setValue('slug', 'assember-dlya-chainikov');
$pgConnection->setValue('price', '250');
$pgConnection->setValue('pubyear', '2019');
$pgConnection->setValue('lang', 'RUS');
$pgConnection->setValue('description', 'дичь');
$pgValues = $pgConnection->getValues();

$pgInsert = $pgConnection->insertRow();
$insertPgQuery = $pgConnection->getQuery();

//select
$pgConnection->setField('*');
$pgConnection->setField('name');
$pgConnection->setField('slug');
$pgConnection->setField('price');
$pgConnection->setField('pubyear');
$pgConnection->setField('lang');
$pgConnection->setField('description');
$pgSelectFields = $pgConnection->getFields('decription');

$pgConnection->setWhere("lang = 'RUS'");
$pgSelectConditions = $pgConnection->getWhere();

$pgConnection->setLimit(9);
$pgSelect = $pgConnection->selectRows();

$selectPgQuery = $pgConnection->getQuery();

//update
$pgConnection->setValue('name', 'Assembler for AVR32 для чайников');
$pgConnection->setValue('slug', 'assember-dlya-chainikov');
$pgConnection->setValue('price', '250');
$pgConnection->setValue('pubyear', '2019');
$pgConnection->setValue('lang', 'RUS');
$pgConnection->setValue('description', 'дикая дичь');
$pgUpdateValues = $pgConnection->getValues();

$pgConnection->setWhere("name = 'Assembler for AVR32 для чайников'");
$pgUpdateConditions = $pgConnection->getWhere();

$pgUpdate = $pgConnection->updateRow();
$updatePgQuery = $pgConnection->getQuery();

//delete
$pgConnection->setWhere("name = 'Assembler for AVR32 для чайников'");
$pgDeleteConditions = $pgConnection->getWhere();

$pgDelete = $pgConnection->deleteRow();
$deletePgQuery = $pgConnection->getQuery();


include 'templates/index.tpl.php';