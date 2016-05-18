<?php
	include_once("db.php");
	include_once("session_get.php");

	$question = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['question'])));
	$user_id = mysqli_fetch_array(mysqli_query($connection, "SELECT `User_id` FROM `Users` WHERE `Name` LIKE '$username'"))['User_id'];
	if (mb_strlen($question) == 0)
		$error_message = $error_message . "Поле Вопрос не должно быть пустым.<br>";

	if (mb_strlen($error_message) != 0)
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=$error_message");
	else{
		$add_query = mysqli_query($connection, "INSERT INTO `Themes`(`Question`, `User_id`, `Date`) VALUES('$question', $user_id, now())");
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=Тема добавлена.");
	}