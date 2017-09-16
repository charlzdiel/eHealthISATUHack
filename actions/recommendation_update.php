<?php 
include "../ini.php";
if( $_POST["update"] ){
	$action = $_POST["action"];
	$r_id = $_POST["r_id"];
	$doctor_name = $_POST["doctor_name"];
	$illness_name = $_POST["illness_name"];
	$comment = $_POST["comment"];
	
	if( $action=="add" ){
		$qry = "INSERT INTO recommendations (`doctor_id`,`illness_id`,`comments`) VALUES ('{$doctor_name}','{$comment}')";
		$message = "added";
	} elseif( $action=="update" ){
		$qry = "UPDATE recommendations SET `doctor_id`='{$doctor_name}',`illness_id`='{$illness_name}',`comments`='{$comment}' WHERE `r_id`={$r_id}";
		$message = "updated";
	}
	$rslt = $DB->query($qry);
	if($rslt){
		$_SESSION["recommendation_success"] = "Recommendation " . $message . "successfully ";
	} else {
		$_SESSION["recommendation_error"] = "Error updating recommendations. Contact system administrator.";
	}
} else {
	$_SESSION["recommendation_error"] = "You need to fill up the form.";
}
header( "Location: ./../index.php?page=recommendations" );

?>