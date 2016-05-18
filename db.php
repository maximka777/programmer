<?php 
	$connection = mysqli_connect("localhost","root","777");
	$db = mysqli_select_db($connection, "programmer.by");
	mysqli_query($connection, "SET NAMES 'utf8' ");
	if(!$connection || !$db){
		exit(mysql_error());
	}	
?>