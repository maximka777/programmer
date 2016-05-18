<?php
	include_once("psmarty.php");

	$smarty = new PSmarty;

	$smarty->assign("title", "Добавление категории книги");
	$smarty->assign("error_message", $_GET['error_message']);

	$smarty->display("book_cat_add.tpl");