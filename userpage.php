<?php
    include_once('session_get.php');
    include_once('psmarty.php');
    $smarty = new PSmarty;
    include_once('session_assign.php');
    include_once('db.php');

    if(isset($_GET['user'])){
        $user_get = $_GET['user'];
    }
    else{
        $user_get = $username;
    }

    $user = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `Users` WHERE `Name` LIKE '$user_get'"));
    $user_group_id = $user['Group_id'];
    $user_get_type = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `User_Groups` WHERE `Group_id` = $user_group_id"))['Name'];
    $user_id = $user['User_id'];
    $msg_count = mysqli_num_rows(mysqli_query($connection, "SELECT `Comment_id` FROM `News_Comments` WHERE `User_id` = $user_id")) + 
        mysqli_num_rows(mysqli_query($connection, "SELECT `Comment_id` FROM `Theme_Comments` WHERE `User_id` = $user_id"));
    $theme_count = mysqli_num_rows(mysqli_query($connection, "SELECT `Theme_id` FROM `Themes` WHERE `User_id` = $user_id"));
    $smarty->assign('user', $user);
    $smarty->assign('user_get_type', $user_get_type);
    $smarty->assign('theme_count', $theme_count);
    $smarty->assign('msg_count', $msg_count);
    $smarty->assign('title', $user['Name']);
    $smarty->display('userpage.tpl');

    

    mysqli_close($connection);