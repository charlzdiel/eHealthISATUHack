<?php include "./actions/check_user.php"; ?>

<?php
if($_SESSION["acct_type"]==1){
	
	$qry = "SELECT * FROM diagnosis ORDER BY illness_id";
	$rslt = $DB->query($qry);
	if($rslt){
?>

<?php if( isset( $_SESSION["diagnosis_error"] ) ){ ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $_SESSION["diagnosis_error"]; unset($_SESSION["diagnosis_error"]); ?>
	</div>
<?php } ?>
<?php if( isset( $_SESSION["diagnosis_success"] ) ){ ?>
	<div class="alert alert-success" role="alert">
		<?php echo $_SESSION["diagnosis_success"]; unset($_SESSION["diagnosis_success"]); ?>
	</div>
<?php } ?>

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-6 col-xs-6">
					<h3>Diagnosis</h3>
				</div>
				<?php if($_SESSION["acct_type"]==2){ ?>
				<div class="col-md-6 col-xs-6">
					
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Patient Name</th>
						<th>Illness</th>
						<th>Time Stamp</th>
						<th>Status</th>
						<th style="width:10%;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if($rslt->num_rows>0){ ?>
					<?php
						while( $diagnosis = $rslt->fetch_object() ){
					?>
					<tr>
						<td><?php echo $diagnosis->patient_id; ?></td>	
						<td><?php echo $diagnosis->illness_id; ?></td>	
						<td><?php echo $diagnosis->timestamp; ?></td>	
						<td><?php if ( $diagnosis->status==0) {
						echo "Auto Generated";
					}else{
						echo "Doctor's Prescriptions";
					} ?></td>
						<td>
								<!-- <a href="index.php?page=diag&id=<?php // echo $diagnosis->diag_id; ?>"><label class="glyphicon glyphicon-pencil" style="color:green;" title="Activate"></label></a>
								<a class="delete" href="./actions/diagnosis_delete.php?&id=<?php // echo $diagnosis->diag_id; ?>"><label class="glyphicon glyphicon-remove" style="color:red;" title="Delete"></label></a> -->
								<a href="index.php?page=diagnosis_view&id=<?php echo $diagnosis->diag_id; ?>"><label class="glyphicon glyphicon-eye-open" style="color:green;" title="Activate"></label></a>
						</td>	
					</tr>
					<?php } ?>
					<?php } else { ?>
					<tr>
						<td colspan="4" style="text-align:center;">No record found.</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php } else { ?>
<h3 style="text-align:center;">Error retrieving diagnosis list.</h3>
<?php } ?>









	


<?php
	} else if($_SESSION["acct_type"]==2){
		echo "<h1>Request for diagnosis</h1><h4>Provide the symptoms that you feel:</h4>";
		$symptoms = $DB->query( "SELECT * FROM `symptoms` ORDER BY `name`" );
		if( $symptoms && $symptoms->num_rows > 0 ){
?>
		<form method="POST" action="./actions/diagnosis_request.php">
<?php while( $symptom = $symptoms->fetch_object() ){ ?>
			<div class="col-md-2 col-xs-2">
				<div class="form-group">
					<input type="checkbox" id="symptom<?php echo $symptom->symptom_id ?>"
								value="<?php echo $symptom->symptom_id ?>" 
								name="symptom[]" />&nbsp;&nbsp;<label title="<?php echo $symptom->description ?>" for="symptom<?php echo $symptom->symptom_id ?>"><?php echo $symptom->name ?></label>
				</div>
			</div>
<?php } ?>
	<div style="clear:both;"></div>
	<input type="submit" class="btn btn-primary pull-right" name="request_diagnosis" value="Request" />
<?php
} else { echo "No record found!"; } } ?>
</form>