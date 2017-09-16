<?php 
include "../ini.php";
if( $_POST["update"] ){
	$action = $_POST["action"];
	$illness_name = $_POST["illness_name"];
	$illness_desc = $_POST["illness_desc"];
	
	if( $action=="add" ){
		$qry = "INSERT INTO illness (`name`,`description`) VALUES ('{$illness_name}','{$illness_desc}')";
		$message = "added";
	} elseif( $action=="update" ){
		$illness_id = $_POST["illness_id"];
		$qry = "UPDATE illness SET `name`='{$illness_name}',`description`='{$illness_desc}' WHERE `illness_id`={$illness_id}";
		$message = "updated";
	}
	$rslt = $DB->query($qry);
	
	if($rslt){
		$_SESSION["illness_success"] = "Successfully " . $message . " illness.";
		if($action=="add"){
			$last = $DB->insert_id;
			if(!empty($_POST['symptom'])) {
			  foreach($_POST['symptom'] as $check) {
			    $qry_illtom = "INSERT INTO illtoms (`illness_id`,`symptom_id`) VALUES ({$last},{$check})";
			    $rslt_illtom = $DB->query($qry_illtom);
			    if(!$rslt_illtom){
						$_SESSION["illness_error"] = "Error updating illness symptoms. Contact system administrator.";	    	
			    }
			  }
			}
		} elseif ($action=="update"){
			$qry_illtom_u = "DELETE FROM illtoms WHERE `illness_id`={$illness_id}";
			$rslt_illtom_u = $DB->query($qry_illtom_u);
			if(!empty($_POST['symptom'])) {

			  foreach($_POST['symptom'] as $check) {
			    $qry_illtom = "INSERT INTO illtoms (`illness_id`,`symptom_id`) VALUES ({$illness_id},{$check})";
			    $rslt_illtom = $DB->query($qry_illtom);
			    if(!$rslt_illtom){
						$_SESSION["illness_error"] = "Error updating illness symptoms. Contact system administrator.";	    	
			    }
			  }
			}
		}
	} else {
		$_SESSION["illness_error"] = "Error updating illness. Contact system administrator.";
	}
} else {
	$_SESSION["illness_error"] = "You need to fill up the form.";
}
header( "Location: ./../index.php?page=illness" );

?>