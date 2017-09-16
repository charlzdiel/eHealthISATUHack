<?php
include "../ini.php";
if( isset($_GET["id"]) ){
	$qry = "DELETE FROM illness WHERE illness_id=" . $_GET["id"];
	$rslt = $DB->query($qry);
	if($rslt){
		$_SESSION["illness_success"] = "Successfully deleted illness.";
	} else {
		$_SESSION["illness_error"] = "Error deleting illness. Contact system administrator.";
	}
	header( "Location: ./../index.php?page=illness" );
}
?>