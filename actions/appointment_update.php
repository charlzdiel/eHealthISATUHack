<?php 
include "../ini.php";
if( $_POST["update"] ){
	$action = $_POST["action"];
	$app_id = $_POST["app_id"];
	$doctor_name = $_POST["doctor_name"];
	$location = $_POST["location"];
	$status = $_POST["status"];
	$diagnosis_id = $_POST["diagnosis_name"];
	
	if( $action=="add" ){
		$qry = "INSERT INTO appointment (`doctor_id`,`location`,`status`,`diag_id`) VALUES ('{$doctor_name}','{$location}','{$status}','{$diagnosis_id}')"; $message = "added";
	} elseif( $action=="update" ){
		$qry = "UPDATE appointment SET `doctor_id`='{$doctor_name}',`location`='{$location}',`status`='{$status}',`diag_id`='{$diagnosis_id}' WHERE `app_id`={$app_id}";
		$message = "updated";

	}
	$rslt = $DB->query($qry);
	if($rslt){
		$_SESSION["appointments_success"] = " Appointment successfully" . $message ;
	} else {
		$_SESSION["appointments_error"] = "Error in updating appointment. Contact system administrator.";
	}
} else {
	$_SESSION["appointments_error"] = "You need to fill up the form.";
}
header( "Location: ./../index.php?page=appointments" );

?>