<?php
	include_once("session_get.php");
	include_once("db.php");

	$name = mysqli_escape_string($connection, trim(htmlspecialchars($_POST['name'])));
	$text = mysqli_escape_string($connection, trim(htmlspecialchars($_POST['text'])));
	if (mb_strlen($name) == 0)
		$error_message = $error_message . "Поле Название не должно быть пустым.<br>";
	if (mb_strlen($text) == 0)
		$error_message = $error_message . "Поле Текст не должно быть пустым.<br>";
	if($_FILES['img'][error] == UPLOAD_ERR_OK){
			$img = "images/news/".md5(file_get_contents($_FILES['img']['tmp_name'])).".".(array_reverse(explode(".", $_FILES['img']['name']))[0]);
			rename($_FILES['img']['tmp_name'], $img);
            chmod($img, 0755);
	}
	else{
		$error_message = $error_message . "Не загружено изображение.<br>";
	}

	if (mb_strlen($error_message) != 0)
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=$error_message");
	else{
		$user_id_row = mysqli_query($connection, "SELECT `User_id` FROM `Users` WHERE `Name` LIKE '$username'");
		$user_id = mysqli_fetch_array($user_id_row)['User_id'];

		$add_query = mysqli_query($connection, "INSERT INTO `News`(`Date`, `Author_id`, `Name`, `Text`, `Image`) VALUES (now(), $user_id, '$name', '$text', '$img')");
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=Новость добавлена.");
	}