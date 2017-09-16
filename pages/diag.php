<?php include "./actions/check_user.php"; ?>
<?php 
	if( isset( $_GET["id"] ) ){
		$action = "update";
		$id = $_GET["id"];
		$qry = "SELECT * FROM illness WHERE diag_id='{$id}'";
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
	<?php if( $action=="update" ){ echo "<h3>Update Diagnosis</h3>"; } else { echo "<h3>Add Diagnosis</h3>"; } ?>
	<form method="POST" action="./actions/diagnosis_update.php">
		<input type="hidden" name="action" id="action" value="<?php echo $action; ?>" />
		<?php if( $action=="update" ){ echo "<input type='hidden' value='" . $diagnosis->diag_id . "' name='diag_id'>"; } ?>
		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				<label for="diagnosis_name">Patient's Name</label>
				<input required type="text" class="form-control" id="patient_name" name="patient_name" value="<?php if( $action=="update" ){ echo $diagnosis->patient_id; } ?>" />
			</div>
			<div class="form-group">
				<label for="Illness">Illness</label>
				<input required type="text" class="form-control" id="illness_name" name="illness_name" value="<?php if( $action=="update" ){ echo $diagnosis->illness_id; } ?>" />
			</div>
			
						<div class="form-group">
				<label for="status">Status</label>
				
				<select class="form-control" id="status" name="status">
        		<option value="0">Auto Generated</option>
        		<option value="1">Doctor's Prescription</option>
       			</select> 
			</div>
			<input type="submit" name="update" value="Submit" class="btn btn-primary pull-right" />		
		</div>
		</div>
	</form>
</div>