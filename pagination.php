<?php
	$row_count = mysqli_num_rows($query_result);
	$page_count = ceil($row_count/$per_page);

	$cur_url = $_SERVER['SCRIPT_NAME'];

	if(isset($_GET['page']))
	    $cur_page = $_GET['page'];
	else
	    $cur_page = 1;

?>