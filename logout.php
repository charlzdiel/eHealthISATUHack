<?php
	include "ini.php";
	setcookie("User", "", mktime());
	session_destroy();
	header("Location: index.php");
	exit();