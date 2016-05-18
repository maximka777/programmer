<?php
    include_once('session_get.php');
    include_once('psmarty.php');
    $smarty = new PSmarty;
    include_once('session_assign.php');
    include_once('db.php');

    //pagination--------------------------
    $per_page = 5;
    $cur_url = $_SERVER['SCRIPT_NAME'];

    if(isset($_GET['page']))
        $cur_page = $_GET['page'];
    else
        $cur_page = 1;
    $page_count = ceil(mysqli_num_rows(mysqli_query($connection, "SELECT * FROM Jobs ORDER BY Date DESC"))/ $per_page);
    $low = ($cur_page - 1) * $per_page;
    $high = ($cur_page) * $per_page;
    //$smarty->assign("high", $high);
    $smarty->assign("page_count", $page_count);
    //pagination--------------------------
    
    $query_result = mysqli_query($connection, "SELECT * FROM Jobs ORDER BY Date DESC LIMIT $low, $high");
    

    $i = 0;
    while($job = mysqli_fetch_array($query_result)){
    	$jobs[$i++] = $job;
    }

    mysqli_close($connection);

    $smarty->assign('jobs', $jobs);
    $smarty->display('jobs.tpl');