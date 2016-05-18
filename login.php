<?php
	session_start();

	include_once('db.php');

	$error_message = "";

	if(isset($_POST['login']) && isset($_POST['pass'])){
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		$query_result = mysqli_query($connection, "SELECT `Password`, `Status` FROM `Users` WHERE `Name` LIKE '$login'");
			
		//print_r($rec);
		if(mysqli_num_rows($query_result) == 0){
			$error_message = $error_message . "Неправильный логин";
		}
		else{
			$rec = mysqli_fetch_array($query_result);
			//echo $rec['Password'];
			if(md5($pass) != $rec['Password']){
				$error_message = $error_message . "Неправильный пароль";
			}
			else{
				$_SESSION['login'] = $login;
				$_SESSION['logged'] = 1;
			}
		}
		if($rec['Status'] != 1){
			$error_message = $error_message . "Вы не подтвердили почту или были заблокированы";
		}
	}

	if(mb_strlen($error_message) != 0){
		unset($_SESSION['login']);
		unset($_SESSION['logged']);
	}

	header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=$error_message");
