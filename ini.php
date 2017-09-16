<?php
	session_start();
	require_once "config.php";
	require_once "actions/functions.php";
	$page = "pages/home.php";
	if(isset($_GET['page'])) {
		if(file_exists("pages/" . $_GET['page'] . ".php")) {
			$page = "pages/" . $_GET['page'] . ".php";			
		} else {
			$page = "pages/404.php";
		}
	}
?>