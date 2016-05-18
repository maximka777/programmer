<?php
	include_once("psmarty.php");
	include_once("db.php");

	$smarty = new PSmarty;

	$query_result = mysqli_query($connection, "SELECT `Category_id`, `Name` FROM `Book_Categories`");

	$cats = array();

	while($cat = mysqli_fetch_array($query_result)){
		array_push($cats, $cat);
	}
	
	$smarty->assign("cats", $cats);
	$smarty->assign("title", "Добавление книги");
	$smarty->assign("error_message", $_GET['error_message']);

	$smarty->display("book_add.tpl");