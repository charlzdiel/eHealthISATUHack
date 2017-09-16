<?php 
include "../ini.php";
if( $_POST["update"] ){
	//$doctor_id = $_POST["user_id"];
	$d = $DB->query("SELECT doctor_id FROM doctor WHERE user_id=" . $_POST["user_id"]);
	$dd = $d->fetch_object();
	$doctor_id = $dd->doctor_id;
	$illness_id = $_POST["illness_id"];
	$comment = $_POST["comment"];
	
	
		$qry = "INSERT INTO recommendations (`doctor_id`,`illness_id`,`comments`) VALUES ({$doctor_id},{$illness_id},'{$comment}')";
		//echo $qry; exit(0);
	$rslt = $DB->query($qry);
	if($rslt){
		$_SESSION["recommendation_success"] = "Recommendation added successfully ";
	} else {
		$_SESSION["recommendation_error"] = "Error updating recommendations. Contact system administrator.";
	}
} else {
	$_SESSION["recommendation_error"] = "You need to fill up the form.";
}
header( "Location: ./../index.php?page=recommendations" );

?>