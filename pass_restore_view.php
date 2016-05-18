<?php
	include_once('psmarty.php');
    $smarty = new PSmarty;
    $smarty->assign("error_message", $_GET['error_message']);
    $smarty->display("pass_restore_view.tpl");