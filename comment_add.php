<?php
	include_once('session_get.php');
	include_once('db.php');
	$text = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['comment'])));
	if ($text != ""){
		if ($_POST['new_id'] != ""){
			$table = "News_Comments";
			$id = $_POST['new_id'];
			$field = "New_id";
		}
		if ($_POST['theme_id'] != ""){
			$table = "Theme_Comments";
			$id = $_POST['theme_id'];
			$field = "Theme_id";
		}

		$user_id = mysqli_fetch_array(mysqli_query($connection, "SELECT `User_id` FROM `Users` WHERE `Name` LIKE '$username'"))['User_id'];
		$query_result = mysqli_query($connection, "INSERT INTO `$table`(`User_id`, `Text`, `Date`, `$field`) VALUES ($user_id, '$text', now(), $id)");
		if($table == "Theme_Comments"){
			$query_result = mysqli_query($connection, "SELECT `Count` FROM `Themes` WHERE `Theme_id` = $id");
			$count = mysqli_fetch_array($query_result)['Count'];
			$count++;
			mysqli_query($connection, "UPDATE `Themes` SET  `Count` =  $count WHERE `Theme_id` = $id");
		}
	}

	header('Location: '.($_SERVER['HTTP_REFERER']));