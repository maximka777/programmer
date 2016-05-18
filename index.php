<?php
	include_once('session_get.php');


    include_once('psmarty.php');
    $smarty = new PSmarty;

    include_once('session_assign.php');
    $smarty->assign("error_message", $_GET['error_message']);
    $smarty->display('index.tpl');