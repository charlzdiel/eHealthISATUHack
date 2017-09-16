<?php 
include "../ini.php";
if( $_POST["update"] ){
	$action = $_POST["action"];
	$user_name = $_POST["user_name"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$acct_type= $_POST["acct_type"];
	if(isset($_POST["specialization"])) { $spec = $_POST["specialization"]; }
	
	if( $action=="add" ){
		$qry = "INSERT INTO users (`name`,`username`,`password`,`acct_type`) VALUES ('{$user_name}','{$username}','{$password}','{$acct_type}')";
		$message = "added";
	} elseif( $action=="update" ){
		$user_id = $_POST["user_id"];
		$qry = "UPDATE users SET `name`='{$user_name}',`username`='{$username}',`password`='{$password}',`acct_type`='{$acct_type}' WHERE `user_id`={$user_id}";
		$message = "updated";
	}
	$rslt = $DB->query($qry);
	if($rslt){
		if(isset($spec)){
			// doc
			if( $action=="add" ){
				$last = $DB->insert_id;
				$qry_doc = "INSERT INTO doctor (`user_id`,`specialization`) VALUES ({$last},'{$spec}')";
				$rslt_doc = $DB->query($qry_doc);
			} elseif( $action=="update" ){
				$qry_del = "DELETE FROM doctor WHERE user_id={$user_id}";
				$rslt_del = $DB->query($qry_del);
				$qry_doc = "INSERT INTO doctor (`user_id`,`specialization`) VALUES ({$user_id},'{$spec}')";
				$rslt_doc = $DB->query($qry_doc);
			}
		}
		$_SESSION["user_success"] = "Successfully " . $message . " symptom.";
	} else {
		$_SESSION["user_error"] = "Error updating user. Contact system administrator.";
	}
} else {
	$_SESSION["user_error"] = "You need to fill up the form.";
}
header( "Location: ./../index.php?page=accounts" );

?>