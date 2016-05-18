<?php
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['logged']);

	header('Location: '.$_SERVER['HTTP_REFERER']);