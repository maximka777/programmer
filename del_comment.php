<?php
	include_once('session_get.php');
	include_once('db.php');

	if (isset($_GET['table'])){
		$table = $_GET['table'];
	}
	else
		$table = "";

	if (isset($_GET['id'])){
		$id = $_GET['id'];
	}
	else
		$id = "";

	if (isset($_GET['theme_id'])){
		$theme_id = $_GET['theme_id'];
	}
	else
		$theme_id = "";

	if(($username != "") && ($table != "") && ($id != "")){
		switch($table){
			case "Books":
				$id_column = "Book_id";
				break;
			case "Jobs":
				$id_column = "Job_id";
				break;
			case "News":
				$id_column = "New_id";
				break;
			case "Themes":
				$id_column = "Theme_id";
				break;
			case "News_Comments":
			case "Theme_Comments":
				$id_column = "Comment_id";
				break;
			default:
				$id_column = "";
		}
		if($id_column != ""){
			mysqli_query($connection, "DELETE FROM `$table` WHERE `$id_column` = $id");
			if ($table == "Theme_Comments"){
				$query_result = mysqli_query($connection, "SELECT `Count` FROM `Themes` WHERE `Theme_id` = $theme_id");
				$count = mysqli_fetch_array($query_result)['Count'];
				$count--;
				mysqli_query($connection, "UPDATE `Themes` SET  `Count` =  $count WHERE `Theme_id` = $theme_id");
			}
		}
	}

	header('Location: '.$_SERVER['HTTP_REFERER']);