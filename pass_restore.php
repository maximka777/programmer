<?php
	include_once('db.php');

	$login = $_POST['login'];
	if (mb_strlen($login) == 0)
		$error_message = $error_message . "Поле Логин не должно быть пустым.<br>";

	if(mysqli_num_rows(mysqli_query($connection, "SELECT User_id FROM `Users` WHERE `Name` LIKE '$login'")) == 0){
		$error_message = $error_message . "Пользователя с таким логином не существует.<br>";	
	}

	if (mb_strlen($error_message) != 0)
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=$error_message");
	else{
		$activation = md5($login.time());
		mysqli_query($connection, /*"UPDATE `Users` SET `Activation` = '' WHERE `Name` LIKE '$login'"*/"UPDATE `Users` SET `Activation` = '$activation' WHERE  `Name` LIKE '$login'");
		include_once("smtp/SendMail.php");
		$base_url='http://programmer.maksim-barouski.ru/new_pass.php';
		$to = mysqli_fetch_array(mysqli_query($connection, "SELECT Mail FROM `Users` WHERE `Name` LIKE '$login'"))['Mail'];
		$subject = "Изменение пароля";
		$link = $base_url."?activation=$activation";
		$text = "Перейдите по ссылке <a href='$link'>$link</a>";
		SendMail($to, $subject, $text); 
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=Зайдите на почту");
	}
