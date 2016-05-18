<?php
	include_once("psmarty.php");

	$smarty = new PSmarty;

	$smarty->assign("title", "Добавление новости");
	$smarty->assign("error_message", $_GET['error_message']);

	$smarty->display("news_add.tpl");

