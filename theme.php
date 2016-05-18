<?php
    include_once('session_get.php');
    include_once('psmarty.php');
    $smarty = new PSmarty;
    include_once('session_assign.php');
    include_once('db.php');

    if(isset($_GET['Theme_id'])){
    	$Theme_id = $_GET['Theme_id'];
    	$query_result = mysqli_query($connection, "SELECT Theme_id, Question, Date, Count, Name, Avatar  FROM Themes, Users WHERE Themes.User_id=Users.User_id AND Theme_id = $Theme_id");
    	$theme = mysqli_fetch_array($query_result);
    	$smarty->assign('theme', $theme);
        $smarty->assign('table', "Theme_Comments");

    	$query_result = mysqli_query($connection, "SELECT `Theme_id`, `Comment_id`, `Text`, `Date`, `Name`, `Avatar` FROM `Theme_Comments`, `Users` WHERE    
            `Theme_id` = $Theme_id AND Theme_Comments.User_id = Users.User_id ORDER BY `Date`" );

        $per_page = 10;
        include_once('pagination.php');
        $smarty->assign('cur_url', $cur_url);
        $smarty->assign('page_count', $page_count);
        $smarty->assign('cur_page', $cur_page);
        $smarty->assign('per_page', $per_page);
        $smarty->assign('row_count', $row_count);
        $smarty->assign('theme_id', $Theme_id);
        $get_params = "?Theme_id=".$_GET['Theme_id'];

        $smarty->assign('get_params', $get_params);

    	$i = 0;
    	while($comment = mysqli_fetch_array($query_result)){
    		$comments[$i++] = $comment;
    	}
	$smarty->assign('comments', $comments);
    
    	$smarty->display('theme.tpl');
    }
    else
    	$smarty->display('404.tpl');

    

    mysqli_close($connection);