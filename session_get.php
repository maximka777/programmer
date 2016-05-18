<?php
	session_start();

	$logged = 1;
	if(isset($_SESSION['login'])){
		$username = $_SESSION['login'];
	}
	else{
		$username = "";
	}
	if(!isset($_SESSION['logged']) or empty($_SESSION['logged'])){
		$logged = 0;
	}

	if($username != ""){
		include_once('db.php');
		$query_result = mysqli_query($connection, "SELECT `Group_id` FROM `Users` WHERE `Name` LIKE '$username'");
		$row = mysqli_fetch_array($query_result);
		$group_id = $row['Group_id'];
		$query_result = mysqli_query($connection, "SELECT `Name` FROM `User_Groups` WHERE `Group_id` = '$group_id'");
		$row = mysqli_fetch_array($query_result);
		$usertype = $row['Name'];
	}
	else{
		$usertype = "";
	}