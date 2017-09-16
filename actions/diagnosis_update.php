<?php 
include "../ini.php";
if( $_POST["update"] ){
	$action = $_POST["action"];
	$diag_id = $_POST["diag_id"];
	$patient_id = $_POST["patient_name"];
	$illness_id= $_POST["illness_name"];
	$timestamp= $_POST["timestamp"];
	$status= $_POST["status"];
	
	if( $action=="add" ){
		$qry = "INSERT INTO diagnosis (`illness_id`,`patient_id`,`timestamp`,`status`) VALUES ('{$illness_id}','{$patient_id}','{$timestamp}','{$status}')";
		$message = "added";
	} elseif( $action=="update" ){
		$qry = "UPDATE diagnosis SET `patient_id`='{$patient_id}',`illness_id`='{$illness_id}',`timestamp`='{$timestamp}',`status`='{$status}' WHERE `diag_id`={$diag_id}";
		$message = "updated";
	}
	$rslt = $DB->query($qry);

	if($rslt){
		$_SESSION["diagnosis_success"] = "Successfully " . $message . " diagnosis.";
	} else {
		$_SESSION["diagnosis_error"] = "Error updating diagnosis. Contact system administrator.";
	}
} else {
	$_SESSION["diagnosis_error"] = "You need to fill up the form.";
}
header( "Location: ./../index.php?page=diagnosis" );

?>