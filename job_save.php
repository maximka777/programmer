<?php
	include_once('psmarty.php');

	include_once('db.php');
	$error_message = "";

	$name = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['name'])));
	$employer = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['employer'])));
	$description = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['description'])));
	$requirements = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['requirements'])));
	$salary = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['salary'])));
	$number = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['number'])));
	$mail = mysqli_real_escape_string($connection, trim(htmlspecialchars($_POST['mail'])));
	if (mb_strlen($name) == 0)
		$error_message = $error_message . "Поле Должность не должно быть пустым.<br>";
	if (mb_strlen($employer) == 0)
		$error_message = $error_message . "Поле Работодатель не должно быть пустым.<br>";
	if (mb_strlen($description) == 0)
		$error_message = $error_message . "Поле Описание не должно быть пустым.<br>";
	if (mb_strlen($requirements) == 0)
		$error_message = $error_message . "Поле Требования не должно быть пустым.<br>";
	if (mb_strlen($salary) == 0)
		$error_message = $error_message . "Поле Зарплата не должно быть пустым.<br>";
	if (mb_strlen($number) == 0)
		$error_message = $error_message . "Поле Телефон не должно быть пустым.<br>";
	if (mb_strlen($mail) == 0)
		$error_message = $error_message . "Поле Почта не должно быть пустым.<br>";
	
	

	

	
	if (mb_strlen($error_message) != 0)
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=$error_message");
	else{
		$add_query = mysqli_query($connection, "INSERT INTO `Jobs`(`Date`, `Name`, `Employer`, `Description`, `Requirements`, `Salary`, `Number`, `Mail`) VALUES (now(), '$name', '$employer', '$description', '$requirements', '$salary', '$number', '$mail')");
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=Вакансия добавлена.");
	}