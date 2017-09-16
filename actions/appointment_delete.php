<?php
include "../ini.php";
if( isset($_GET["id"]) ){
	$qry = "DELETE FROM appointment WHERE app_id=" . $_GET["id"];
	$rslt = $DB->query($qry);
	if($rslt){
		$_SESSION["appointments_success"] = "Appointment successfully deleted .";
	} else {
		$_SESSION["appointmnets_error"] = "Error deleting appointment. Contact system administrator.";
	}
	header( "Location: ./../index.php?page=appointments" );
}
?>