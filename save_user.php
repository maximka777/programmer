<?php
	include_once('psmarty.php');

	include_once('db.php');

	$login = $_POST['login'];
	$password = $_POST['password'];
	$mail = $_POST['mail'];
	$error_message = "";

	if (mb_strlen($login) == 0)
		$error_message = $error_message . "Поле Логин не должно быть пустым.<br>";
	
	if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $login))
		$error_message = $error_message . "Логин содержит запрещённые символы (допускаются латинские символы и цифры).<br>";

	if (mb_strlen($password) < 8)
		$error_message = $error_message . "Пароль должен содержать не менее 8 символов.<br>";

	if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $password))
		$error_message = $error_message . "Пароль содержит запрещённые символы (допускаются латинские символы и цифры).<br>";

	if (mb_strlen($mail) == 0)
		$error_message = $error_message . "Поле E-Mail не должно быть пустым.<br>";
	
	if (!preg_match("/^\w[\w.-]*@(\w+\.)+\w{2,6}$/", $mail))
		$error_message = $error_message . "Поле почта содержит запрещённые символы (допускаются латинские символы и цифры).<br>";

	/*$query_result = mysql_query("SELECT User_id FROM `Users` WHERE `Name` LIKE '$login' OR `Mail` LIKE '$mail'");
	$row = mysql_fetch_array($query_result);
	print_r($row);*/


	

	if(mysqli_num_rows(mysqli_query($connection, "SELECT User_id FROM `Users` WHERE `Name` LIKE '$login' OR `Mail` LIKE '$mail'")))
		$error_message = $error_message . "Пользователь с таким логином или почтой уже зарегистрирован.<br>";

	if (mb_strlen($error_message) != 0)
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=$error_message");
	else{
		
		if($_FILES['icon'][error] == UPLOAD_ERR_OK){
			$avatar = "images/avatarki/".md5(file_get_contents($_FILES['icon']['tmp_name'])).".".(array_reverse(explode(".", $_FILES['icon']['name']))[0]);
			
			rename($_FILES['icon']['tmp_name'], $avatar);
                        chmod($avatar, 0755);
		}
		else{
			$avatar = "images/avatarki/unknown-user.png";
		}
		
		$md5_pass = md5($password);
		$activation = md5($mail.time());
		$add_query = mysqli_query($connection, "INSERT INTO Users(Name, Password, Mail, Avatar, Activation) VALUES ('$login', '$md5_pass', '$mail', '$avatar', '$activation')");
		include_once("smtp/SendMail.php");
		$base_url='http://programmer.maksim-barouski.ru/activation.php';
		$to = $mail;
		$subject = "Подтверждение электронной почты";
		$link = $base_url."?activation=$activation";
		$text = "Для подтверждения электронной почты перейдите по ссылке <a href='$link'>$link</a>";
		SendMail($to, $subject, $text); 
                
                
		header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=Подтвердите ваш почтовый ящик.");
	}
