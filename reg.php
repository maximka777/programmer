<?php
	include_once('psmarty.php');
	$smarty = new PSmarty;

	$smarty->assign('title', 'Регистрация');

	if(isset($_GET['error_message']))
		$smarty->assign('error_message', $_GET['error_message']);
	else
		$smarty->assign('error_message', "");

	$smarty->display('reg.tpl');
