<?php
    include_once('session_get.php');
	include_once('psmarty.php');
    $smarty = new PSmarty;
    include_once('session_assign.php');
    include_once('db.php');

    if(isset($_GET['Category_id'])){
    	$Category_id = $_GET['Category_id'];
    	$query_result = mysqli_query($connection, "SELECT * FROM Books WHERE Category_id = $Category_id");
    }
    else{
    	$query_result = mysqli_query($connection, "SELECT * FROM Books");
    }

    $per_page = 10;
    require_once('pagination.php');
    $smarty->assign('cur_url', $cur_url);
    $smarty->assign('page_count', $page_count);
    $smarty->assign('row_count', $row_count);
    $smarty->assign('cur_page', $cur_page);
    $smarty->assign('per_page', $per_page);
    if(isset($_GET['Category_id'])){
        $get_params = "?Category_id=".$_GET['Category_id']."&";
    }
    else
        $get_params = "?";

    $smarty->assign('get_params', $get_params);

    $i = 0;
    while($book = mysqli_fetch_array($query_result)){
    	$books[$i++] = $book;
    }

    $query_result = mysqli_query($connection, "SELECT * FROM Book_Categories");
    $i = 0;
    while($category = mysqli_fetch_array($query_result)){
    	$categories[$i++] = $category;
    }

    mysqli_close($connection);

    $smarty->assign('books', $books);
    $smarty->assign('categories', $categories);

    $smarty->display('books.tpl');
