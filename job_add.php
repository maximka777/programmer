<?php
	include_once('session_get.php');
    

	if ($logged == 1){
		include_once('psmarty.php');
	    $smarty = new PSmarty;
	    include_once('session_assign.php');
		$smarty->assign('title', 'Добавление вакансии');

		if(isset($_GET['error_message']))
			$smarty->assign('error_message', $_GET['error_message']);
		else
			$smarty->assign('error_message', "");

		$smarty->display('job_add.tpl');
	}