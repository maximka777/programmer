<?php
    include_once('session_get.php');
    include_once('psmarty.php');
    $smarty = new PSmarty;
    include_once('session_assign.php');
    include_once('db.php');

    if(isset($_GET['New_id'])){
    	$New_id = $_GET['New_id'];
    	$query_result = mysqli_query($connection, "SELECT News.Name, Date, Text, Users.Name, Image FROM News, Users WHERE New_id = $New_id AND News.Author_id = Users.User_id");
    	if(mysqli_num_rows($query_result) == 0)
    		$smarty->display('404.tpl');
    	else{
		    $new = mysqli_fetch_array($query_result);
	    	$smarty->assign('new', $new);
            $smarty->assign('table', "News_Comments");

	    	$query_result = mysqli_query($connection, "SELECT Comment_id, Text, Date, Name, Avatar FROM News_Comments, Users WHERE New_id = $New_id AND News_Comments.User_id = Users.User_id");
            $per_page = 10;
            include_once('pagination.php');
            $smarty->assign('cur_url', $cur_url);
            $smarty->assign('page_count', $page_count);
            $smarty->assign('cur_page', $cur_page);
            $smarty->assign('per_page', $per_page);
            $smarty->assign('row_count', $row_count);
            $smarty->assign('new_id', $New_id);
	    	$i = 0;

            if(isset($_GET['New_id'])){
                $get_params = "?New_id=".$_GET['New_id']."&";
            }
            else
                $get_params = "?";

            $smarty->assign('get_params', $get_params);

	    	while($comment = mysqli_fetch_array($query_result)){
	    		$comments[$i++] = $comment;
	    	}

			$smarty->assign('comments', $comments);
			$smarty->display('new.tpl');
    	}
    }
    else{
    	$smarty->display('404.tpl');
    }

    

    mysqli_close($connection);