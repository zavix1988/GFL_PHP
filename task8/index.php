<?php
include 'config.inc.php';
include 'libs/phpQuery.php';
include 'libs/ParseGoogle.php';

$parser = new ParseGoogle();
if($_GET['request']){
    $parser->sendRequest();
    $content = $parser->parseContent();
}

include 'templates/index.tpl.php';

