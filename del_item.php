<?php

	include_once('session_get.php');

	if(isset($_GET['table'])){
		$table = $_GET['table'];
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}

	switch($table){
		case "News":
			$id_field_name = "New_id";
			break;
		case "Books":
			$id_field_name = "Book_id";
			break;
		case "Jobs":
			$id_field_name = "Job_id";
			break;
	}

	echo 'maximka';

	if(isset($table) && isset($id) && isset($id_field_name) && ($usertype == "Администратор")){
		include_once('db.php');
		

		if($table == "Books"){
			if($_GET['book_cat_id']){
				$book_cat_id = $_GET['book_cat_id'];
				$query_result = mysqli_query($connection, "SELECT `Count` FROM `Book_Categories` WHERE `Category_id` = $book_cat_id");
				$count = mysqli_fetch_array($query_result)['Count'];
				$count--;
				mysqli_query($connection, "UPDATE `Book_Categories` SET  `Count` =  $count WHERE `Category_id` = $book_cat_id");
			}
			else{
				header('Location: '.$_SERVER['HTTP_REFERER']);
			}
		}
		mysqli_query($connection, "DELETE FROM `$table` WHERE `$id_field_name` = $id");
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	else{
		header('Location: index.php');
	}
	