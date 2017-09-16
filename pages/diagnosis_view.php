<?php include "./actions/check_user.php"; ?>
<?php 
	if( isset( $_GET["id"] ) ){
		$action = "update";
		$id = $_GET["id"];
		$qry = "SELECT * FROM illness INNER JOIN diagnosis ON illness.illness_id=diagnosis.illness_id INNER JOIN patient ON diagnosis.patient_id=patient.patient_id 
INNER JOIN users ON patient.user_id=users.user_id
		WHERE diag_id='{$id}'";
		$rslt = $DB->query($qry);
		if($rslt){
			$diagnosis = $rslt->fetch_object();
		} else {
			echo "<h3>Error retrieving the diagnosis.</h3>";
		}
	} else {
		$action = "add";
	}
?>
<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="row">
				<?php var_dump($diagnosis); ?>
			</div>
		</div>
	</div>
</div>