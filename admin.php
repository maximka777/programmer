<?php
	include_once('psmarty.php');
	include_once('session_get.php');

	$smarty = new PSmarty;

	include_once('session_assign.php');
	$smarty->assign('title', "Панель администратора");
	if ($usertype == "Администратор"){
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		else{
			$page = "";
		}

		$smarty->assign('page', $page);

		if(isset($_GET['page'])){
			$pagepage = $_GET['pagepage'];

		}
		else{
			$pagepage = "";
		}
		$smarty->assign("pagepage", $pagepage);

		switch ($page) {
			case 'userlist':
				$userlist = array();
				$query_result = mysqli_query($connection, "SELECT * FROM `Users`");
				while ($row = mysqli_fetch_array($query_result)){
					array_push($userlist, $row);
				}
				$smarty->assign('userlist', $userlist);
				$grouplist = array();
				$query_result = mysqli_query($connection, "SELECT * FROM `User_Groups`");
				while ($row = mysqli_fetch_array($query_result)){
					array_push($grouplist, $row);
				}
				$smarty->assign('grouplist', $grouplist);
				break;
			
			case 'newslist':
				$newslist = array();
				$query_result = mysqli_query($connection, "SELECT * FROM `News`");
				while ($row = mysqli_fetch_array($query_result)){
					array_push($newslist, $row);
				}
				$smarty->assign('newslist', $newslist);
				break;
			default:
				# code...
				break;
		}

		$smarty->display('admin.tpl');
	}
	else{
		header('Location: index.php');
	}