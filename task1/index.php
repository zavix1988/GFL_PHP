<?php
session_start();
include 'config.inc.php';
include 'functions.inc.php';


if(!empty($_FILES)){
    addFile($_FILES);
    header("Location: ".$_SERVER['PHP_SELF']); die;
} else if(isset($_GET['del'])) {
    deleteFile($_GET['del']);
	header("Location: ".$_SERVER['PHP_SELF']); die;
} else {
	$files = viewDirFiles(FILE_DIR);
}


include 'templates/index.tpl.php';

if(isset($_SESSION['message'])){
    unset ($_SESSION['message']);
}