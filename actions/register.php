<?php 
include "../ini.php";
if( $_POST["update"] ){
	$action = $_POST["action"];
	$user_id = $_POST["user_id"];
	$user_name = $_POST["user_name"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$acct_type= $_POST["acct_type"];
	
	if( $action=="add" ){
		$qry = "INSERT INTO users (`name`,`username`,`password`,`acct_type`) VALUES ('{$user_name}','{$username}','{$password}','{$acct_type}')";
		$message = "added";
	} elseif( $action=="update" ){
		$qry = "UPDATE users SET `name`='{$user_name}',`username`='{$username}',`password`='{$password}',`acct_type`='{$acct_type}' WHERE `user_id`={$user_id}";
		$message = "updated";
	}
	$rslt = $DB->query($qry);
	if($rslt){
		$_SESSION["register_success"] = "Registered Successfully ";
	} else {
		$_SESSION["register_error"] = "Error updating user. Contact system administrator.";
	}
} else {
	$_SESSION["register_error"] = "You need to fill up the form.";
}
header( "Location: ./../index.php" );

?>