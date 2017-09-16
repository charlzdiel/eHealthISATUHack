<?php 
include "../ini.php";
if( $_POST["update"] ){
	$action = $_POST["action"];
	$symptom_id = $_POST["symptom_id"];
	$symptom_name = $_POST["symptom_name"];
	$symptom_desc = $_POST["symptom_desc"];
	
	if( $action=="add" ){
		$qry = "INSERT INTO symptoms (`name`,`description`) VALUES ('{$symptom_name}','{$symptom_desc}')";
		$message = "added";
	} elseif( $action=="update" ){
		$qry = "UPDATE symptoms SET `name`='{$symptom_name}',`description`='{$symptom_desc}' WHERE `symptom_id`={$symptom_id}";
		$message = "updated";
	}
	$rslt = $DB->query($qry);
	if($rslt){
		$_SESSION["symptom_success"] = "Successfully " . $message . " symptom.";
	} else {
		$_SESSION["symptom_error"] = "Error updating symptom. Contact system administrator.";
	}
} else {
	$_SESSION["symptom_error"] = "You need to fill up the form.";
}
header( "Location: ./../index.php?page=symptoms" );

?>