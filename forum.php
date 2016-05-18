<?php
    include_once('session_get.php');
    include_once('psmarty.php');
    $smarty = new PSmarty;
    include_once('session_assign.php');
    include_once('db.php');

    
    $query_result = mysqli_query($connection, "SELECT Theme_id, Question, Date, Count, Name  FROM Themes, Users WHERE Themes.User_id=Users.User_id ORDER BY `Date` DESC");
    

    $i = 0;
    while($theme = mysqli_fetch_array($query_result)){
    	$themes[$i++] = $theme;
    }

    mysqli_close($connection);

    $smarty->assign('themes', $themes);

    $smarty->display('forum.tpl');