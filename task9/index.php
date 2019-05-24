<?php

include 'libs/HtmlHelper.php';

$tableArray = [
    array("a1","a2","a3"),
    array("b1","b2","b3"),
    array("c1","c2","c3"),
];
$listArray = ['volvo' => 'Volvo', 'saab' => 'Saab', 'opel' => 'Opel', 'audi' =>'Audi'];

$dt = "Coffee";
$dd = "Black hot drink";

$table = HtmlHelper::viewTable($tableArray, 'class="table" id="myTable"');
$noMultipleSelect = HtmlHelper::drawingSelect($listArray, 'select1', false);
$multipleSelect = HtmlHelper::drawingSelect($listArray, 'select2', true);
$uList = HtmlHelper::drawingList($listArray);
$oList = HtmlHelper::drawingList($listArray, true);
$dl = HtmlHelper::descriptionListDraw($dt, $dd);
$checkboxes = HtmlHelper::checkboxesDraw($listArray, 3, "class='form-check'");
$radioButtons = HtmlHelper::radioButtonGroupDraw($listArray, "class='form-check'", 'radio-group');

include 'templates/index.tpl.php';