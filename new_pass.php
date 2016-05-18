<?php
	include_once('psmarty.php');
    $smarty = new PSmarty;
    $smarty->assign("error_message", $_GET['error_message']);
    $smarty->assign('activation', $_GET['activation']);
    $smarty->display("new_pass.tpl");