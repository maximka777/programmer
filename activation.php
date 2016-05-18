<?php

	include_once('db.php');

	if(isset($_GET['activation'])){
		$activation = $_GET['activation'];
		$query_result = mysqli_query($connection, "UPDATE `Users` SET `Status` = '1' WHERE `Activation` = '$activation'");
		mysqli_query($connection, "UPDATE `Users` SET `Activation` = '' WHERE  `Activation` LIKE '$activation'");
		if($query_result)
			echo "Mail is activated<br>";
		else
			echo "Activation Error<br>";
	}
	else
		echo "Activation Error<br>";

	echo "<a href='index.php'>Programer.by</a>";