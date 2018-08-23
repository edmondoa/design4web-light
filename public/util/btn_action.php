<?php

$type = $_POST['db_tools'];
//$type = $_GET['db_tools'];

	switch ($type) {
		case 'userlists':
		//	echo 'userlists';
			header('Location: /admin/users');
     		exit();
			break;
		
		case 'share_activity':
			header('Location: /admin/users/activity');
     		exit();
		break;
		
		case 'prodlists':
			header('Location: /admin/products/lists');
     		exit();
		break;

		case 'create_prod':
			header('Location: /create');
     		exit();
		break;

		case 'clists':
			header('Location: /admin/campaign/lists');
     		exit();
		break;

		case 'create_cmpgn':
			header('Location: /admin/campaign/create');
     		exit();
		break;
	}



?>