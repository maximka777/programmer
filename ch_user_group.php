<?php
	$new_group_id = $_POST['group_'.$_POST['id']];
	$user = $_GET['username'];

	include_once('db.php');

	mysqli_query($connection, "UPDATE `Users` SET `Group_id` = '$new_group_id' WHERE `Name` LIKE '$user'");
	header('Location: '.$_SERVER['HTTP_REFERER']);