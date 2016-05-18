<?php
	include_once('db.php');

	$activation = $_POST['activation'];
	$pass = $_POST['pass'];
	if (mb_strlen($pass) == 0)
		$error_message = $error_message . "Поле Пароль не должно быть пустым.<br>";

	if (mb_strlen($error_message) != 0)
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=$error_message");
	else{
		$pass = md5($pass);
		echo $pass;
		mysqli_query($connection, "UPDATE `Users` SET `Password` = '$pass' WHERE  `Activation` LIKE '$activation'");
		mysqli_query($connection, "UPDATE `Users` SET `Activation` = '' WHERE  `Activation` LIKE '$activation'");
		
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=Пароль изменён");
	}