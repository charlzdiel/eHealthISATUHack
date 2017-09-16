<?php include "./actions/check_user.php"; ?>
<?php 
	if( isset( $_GET["id"] ) ){
		$action = "update";
		$id = $_GET["id"];
		$qry = "SELECT * FROM appointment WHERE app_id='{$id}'";
		$rslt = $DB->query($qry);
		if($rslt){
			$appointment = $rslt->fetch_object();
		} else {
			echo "<h3>Error retrieving the appointment semester.</h3>";
		}
	} else {
		$action = "add";
	}
?>
<div class="row">
	<?php if( $action=="update" ){ echo "<h3>Update Appointment</h3>"; } else { echo "<h3>Add Appointment</h3>"; } ?>
	<form method="POST" action="./actions/appointment_update.php">
		<input type="hidden" name="action" id="action" value="<?php echo $action; ?>" />

		<?php if( $action=="update" ){ echo "<input type='hidden' value='" . $appointment->app_id . "' name='app_id'>"; } ?>
		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				<label for="appointment_name"> Doctor's Name</label>
				<input required type="text" class="form-control" id="doctor_name" name="doctor_name" value="<?php if( $action=="update" ){ echo $appointment->doctor_id; } ?>" />
			</div>
			<div class="form-group">
				<label for="location">Location</label>
				<input required type="text" class="form-control" id="location" name="location" value="<?php if( $action=="update" ){ echo $appointment->location; } ?>" />
			</div>

			<div class="form-group">
				<label for="status">Status</label>
				<select class="form-control" id="status" name="status">
        	<option <?php if( $action=="update" ){ if($appointment->status==0){ echo " selected "; } } ?> value="0">Available</option>
        	<option <?php if( $action=="update" ){ if($appointment->status==1){ echo " selected "; } } ?> value="1">Not Available</option>
       	</select> 
			</div>


			<div class="form-group">
				<label for="diagnosis">Diagnosis</label>
				<input required type="text" class="form-control" id="diagnosis_name" name="diagnosis_name" value="<?php if( $action=="update" ){ echo $appointment->diag_id; } ?>" />
			</div>

			<input type="submit" name="update" value="Submit" class="btn btn-primary pull-right" />		
		</div>
		</div>
	</form>
</div>