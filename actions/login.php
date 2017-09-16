<?php
	include "../ini.php";
	
	if( isset( $_POST["login"] ) ){
		
		if( !isset( $_POST["username"] ) || !isset( $_POST["password"] ) ){
			$_SESSION["login_error"] = "You need to fill up the login form.";
			header( "Location: ../index.php" );
		}
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$qry = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$rslt = $DB->query( $qry );
		if( $rslt && $rslt->num_rows==1){
			$rslt = $rslt->fetch_object();
			$_SESSION["userid"] = $rslt->user_id;
			$_SESSION["name"] = $rslt->name;
			$_SESSION["acct_type"] = $rslt->acct_type;
			header( "Location: ../index.php" );
		} else {
			$_SESSION["login_error"] = "User not found!";
			header( "Location: ../index.php" );
		}
		
	} else {
		$_SESSION["login_error"] = "You need to fill up the login form.";
		header( "Location: ../index.php" );
	}

?>