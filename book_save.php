<?php
	include_once("session_get.php");
	include_once("db.php");

	$error_message = "";

	//print_r($_POST);
	//print_r($_FILES);

	$name = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['name'])));
	$description = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['text'])));
	$author = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['author'])));
	$year = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['year'])));
	if (mb_strlen($name) == 0)
		$error_message = $error_message . "Поле Название не должно быть пустым.<br>";
	if (mb_strlen($description) == 0)
		$error_message = $error_message . "Поле Описание не должно быть пустым.<br>";
	if (mb_strlen($author) == 0)
		$error_message = $error_message . "Поле Автор не должно быть пустым.<br>";
	if (mb_strlen($year) == 0)
		$error_message = $error_message . "Поле Год не должно быть пустым.<br>";
	/*if (!isset($_POST['cat']))
		$error_message = $error_message . "Не выбрана категория.<br>";
	else*/
		$cat_id = $_POST['cat'];

	if($_FILES['img'][error] == UPLOAD_ERR_OK && $_FILES['img'][size] < $_POST['MAX_FILE_SIZE']){
			$img = "images/literature/".md5(file_get_contents($_FILES['img']['tmp_name'])).".".(array_reverse(explode(".", $_FILES['img']['name']))[0]);
			rename($_FILES['img']['tmp_name'], $img);
                        chmod($img, 0755);
	}
	else{
		$error_message = $error_message . "Не загружено изображение.<br>";
	}


	if($_FILES['book'][error] == UPLOAD_ERR_OK && $_FILES['book'][size] < $_POST['MAX_FILE_SIZE']){
			$book = "books/".md5(file_get_contents($_FILES['book']['tmp_name'])).".".(array_reverse(explode(".", $_FILES['book']['name']))[0]);
			rename($_FILES['book']['tmp_name'], $book);
                        chmod($book, 0755);
	}
	else{
		$error_message = $error_message . "Не загружен документ книги.<br>";
	}

	if (mb_strlen($error_message) != 0)
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=$error_message");
	else{

		mysqli_query($connection, "INSERT INTO `Books`(`Year`, `Author`, `Name`, `Description`, `Image`, `Link`, `Category_id`) VALUES ('$year', '$author', '$name', '$description', '$img', '$book', $cat_id)");
		

		$query_result = mysqli_query($connection, "SELECT `Count` FROM `Book_Categories` WHERE `Category_id` = $cat_id");
		$count = mysqli_fetch_array($query_result)['Count'];
		$count++;
		mysqli_query($connection, "UPDATE `Book_Categories` SET  `Count` =  $count WHERE `Category_id` = $cat_id");

		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=Книга добавлена.");
	}