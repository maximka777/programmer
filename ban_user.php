<?php

	include_once('db.php');
	include_once('session_get.php');

	if($usertype == "Администратор"){
		$user = $_GET['username'];
		$user_status = mysqli_fetch_array(mysqli_query($connection, "SELECT `Status` FROM `Users` WHERE `Name` LIKE '$user'"))['Status'];
		if ($user_status == 1){
			$new_status = 0;
		}
		else{
			$new_status = 1;
		}
		mysqli_query($connection, "UPDATE `Users` SET  `Status` =  '$new_status' WHERE `Name` LIKE '$user'");
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	else{
		header('Location: index.php');
	}