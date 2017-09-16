<?php
include "../ini.php";
if( isset($_GET["id"]) ){
	$qry = "DELETE FROM diagnosis WHERE diag_id=" . $_GET["id"];
	$rslt = $DB->query($qry);
	if($rslt){
		$_SESSION["diagnosis_success"] = "Successfully deleted diagnosis.";
	} else {
		$_SESSION["diagnosis_error"] = "Error deleting diagnosis. Contact system administrator.";
	}
	header( "Location: ./../index.php?page=diagnosis" );
}
?>