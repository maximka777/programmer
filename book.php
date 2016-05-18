<?php
    include_once('session_get.php');
    include_once('psmarty.php');
    $smarty = new PSmarty;
    include_once('session_assign.php');
    include_once('db.php');

    if(isset($_GET['Book_id'])){
    	$Book_id = $_GET['Book_id'];
    	$query_result = mysqli_query($connection, "SELECT * FROM Books WHERE Book_id = $Book_id");
    	if(mysqli_num_rows($query_result) == 0)
    		$smarty->display('404.tpl');
    	else{
		    $book = mysqli_fetch_array($query_result);
	    	$smarty->assign('book', $book);
            $smarty->assign('title', $book['Name']);
			$smarty->display('book.tpl');
    	}
    }
    else{
    	$smarty->display('404.tpl');
    }

    

    mysqli_close($connection);