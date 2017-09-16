<?php
include "../ini.php";
if( isset($_GET["id"]) ){
	$qry = "DELETE FROM users WHERE user_id=" . $_GET["id"];
	$rslt = $DB->query($qry);
	if($rslt){
		$_SESSION["user_success"] = "Successfully deleted user.";
	} else {
		$_SESSION["user_error"] = "Error deleting user. Contact system administrator.";
	}
	header( "Location: ./../index.php?page=accounts" );
}
?>