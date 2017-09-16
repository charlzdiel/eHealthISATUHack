<?php include "./actions/check_user.php"; ?>

<?php
	
	$qry = "SELECT * FROM appointment INNER JOIN  doctor ON appointment.doctor_id=doctor.doctor_id INNER JOIN users ON doctor.user_id=users.user_id WHERE app_id=app_id ORDER BY app_id";
	$rslt = $DB->query($qry);
	if($rslt){
?>

<?php if( isset( $_SESSION["appointments_error"] ) ){ ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $_SESSION["appointments_error"]; unset($_SESSION["appointments_error"]); ?>
	</div>
<?php } ?>
<?php if( isset( $_SESSION["appointments_success"] ) ){ ?>
	<div class="alert alert-success" role="alert">
		<?php echo $_SESSION["appointments_success"]; unset($_SESSION["appointments_success"]); ?>
	</div>
<?php } ?>

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-6 col-xs-6">
					<h3>Appointments</h3>
				</div>
				<div class="col-md-6 col-xs-6">
					<a class="btn btn-success btn-large pull-right" href="index.php?page=appointment" style="margin-top:12px;">Add Appointment</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Doctors Name</th>
						<th>Date and Time</th>
						<th>Status </th>
						<th>Location </th>
						<th>Diagnosis </th>
						<th style="width:10%;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if($rslt->num_rows>0){ ?>
					<?php
						while( $appointments = $rslt->fetch_object() ){
					?>
					<tr>
						<td><?php echo $appointments->name; ?></td>	
						<td><?php echo $appointments->datetime; ?></td>	

						<td><?php if ( $appointments->status==0) {
						echo "Available";
					}elseif ($appointments->status==1) {
						echo "Not Available";
					} ?></td>
					<td><?php if ( $appointments->location==0) {
						echo "Available";
					}elseif ($appointments->status==1) {
						echo "Not Available";
					} ?></td>
						<td><?php echo $appointments->location; ?></td>	
						<td><?php echo $appointments->diag_id; ?></td>	
						
						<td>
								<a href="index.php?page=appointment&id=<?php echo $appointments->app_id; ?>"><label class="glyphicon glyphicon-pencil" style="color:green;" title="Activate"></label></a>
								<a class="delete" href="./actions/appointment_delete.php?&id=<?php echo $appointments->app_id; ?>"><label class="glyphicon glyphicon-remove" style="color:red;" title="Delete"></label></a>
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
<h3 style="text-align:center;">Error retrieving appointment list.</h3>
<?php } ?>