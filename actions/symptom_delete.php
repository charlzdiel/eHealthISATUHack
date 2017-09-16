<?php
include "../ini.php";
if( isset($_GET["id"]) ){
	$qry = "DELETE FROM symptoms WHERE symptom_id=" . $_GET["id"];
	$rslt = $DB->query($qry);
	if($rslt){
		$_SESSION["symptom_success"] = "Successfully deleted symptom.";
	} else {
		$_SESSION["symptom_error"] = "Error deleting symptom. Contact system administrator.";
	}
	header( "Location: ./../index.php?page=symptoms" );
}
?>