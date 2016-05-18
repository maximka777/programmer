<?php
	include_once("db.php");

	$name = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['name'])));

	if (mb_strlen($name) == 0)
		$error_message = $error_message . "Поле Название не должно быть пустым.<br>";

	if (mb_strlen($error_message) != 0)
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=$error_message");
	else{
		$add_query = mysqli_query($connection, "INSERT INTO `Book_Categories`(`Name`) VALUES ('$name')");
		//header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=Категория добавлена.");
                header('Location: '."books.php");
        }