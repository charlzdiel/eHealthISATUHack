<?php
include "../ini.php";
if( isset($_GET["id"]) ){
	$id = $_GET["id"];
	$qry = "DELETE FROM tbl_mobile_account WHERE id_number='{$id}'";
	$rslt = $DB->query($qry);
	if($rslt){
		$_SESSION["students_success"] = "Successfully deactivated student.";
	} else {
		$_SESSION["students_error"] = "Error deactivating student. Contact system administrator.";
	}
	header( "Location: ./../index.php?page=students" );
}
?>