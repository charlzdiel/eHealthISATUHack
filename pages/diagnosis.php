<?php include "./actions/check_user.php"; ?>

<?php
	
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
					<a class="btn btn-success btn-large pull-right" href="index.php?page=diag" style="margin-top:12px;">Add Diagnosis</a>
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
	
	$qry = "SELECT * FROM recommendations ORDER BY r_id";
	$rslt = $DB->query($qry);
	if($rslt){
?>

<?php if( isset( $_SESSION["recommendation_error"] ) ){ ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $_SESSION["recommendation_error"]; unset($_SESSION["recommendation_error"]); ?>
	</div>
<?php } ?>
<?php if( isset( $_SESSION["recommendation_success"] ) ){ ?>
	<div class="alert alert-success" role="alert">
		<?php echo $_SESSION["recommendation_success"]; unset($_SESSION["recommendation_success"]); ?>
	</div>
<?php } ?>

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-6 col-xs-6">
					<h3>Recommendation</h3>
				</div>
				<div class="col-md-6 col-xs-6">
					<a class="btn btn-success btn-large pull-right" href="index.php?page=recommendation" style="margin-top:12px;">Add Recommendations</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Doctors Name</th>
						<th>Illness</th>
						<th>Comments</th>
						<th style="width:10%;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if($rslt->num_rows>0){ ?>
					<?php
						while( $recommendation = $rslt->fetch_object() ){
					?>
					<tr>
						<td><?php echo $recommendation->doctor_id; ?></td>	
						<td><?php echo $recommendation->illness_id; ?></td>	
						<td><?php echo $recommendation->comments; ?></td>	
						<td>
								<a href="index.php?page=recommendation_view&id=<?php echo $recommendation->illness_id; ?>"><label class="glyphicon glyphicon-pencil" style="color:blue" title="Activate"></label></a>
								<a href="index.php?page=recommendation&id=<?php echo $recommendation->r_id; ?>"><label class="glyphicon glyphicon-pencil" style="color:green;" title="Activate"></label></a>
								<a class="delete" href="./actions/recommendation_delete.php?&id=<?php echo $recommendation->r_id; ?>"><label class="glyphicon glyphicon-remove" style="color:red;" title="Delete"></label></a>
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
<h3 style="text-align:center;">Error retrieving recommendation list.</h3>
<?php } ?>



<?php 
	if( isset( $_GET["id"] ) ){
		$action = "update";
		$id = $_GET["id"];
		$qry = "SELECT * FROM illness WHERE illness_id='{$id}'";
		$rslt = $DB->query($qry);
		if($rslt){
			$illness = $rslt->fetch_object();
		} else {
			echo "<h3>Error retrieving the illness .</h3>";
		}
	} else {
		$action = "add";
	}
?>

<div class="row">
	<?php if( $action=="update" ){ echo "<h3>Update Illness </h3>"; } else { echo "<h3>Add Illness </h3>"; } ?>
	<form method="POST" action="./actions/illness_update.php">
		<input type="hidden" name="action" id="action" value="<?php echo $action; ?>" />
		<?php if( $action=="update" ){ echo "<input type='hidden' value='" . $illness->illness_id . "' name='illness_id'>"; } ?>
		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				<label for="illness_name">Name</label>
				<input required type="text" class="form-control" id="illness_name" name="illness_name" value="<?php if( $action=="update" ){ echo $illness->name; } ?>" />
			</div>

			<div class="form-group">
				<label for="illness_desc">Description</label>
				<input required type="text" class="form-control" id="illness_desc" name="illness_desc" value="<?php if( $action=="update" ){ echo $illness->description; } ?>" />
			</div>
			<div class="form-group">
				<label for="illness_desc">Symptoms</label>
			</div>
	<?php
		$symptoms = $DB->query( "SELECT * FROM `symptoms` ORDER BY `name`" );
	?>	

			<?php if( $symptoms && $symptoms->num_rows > 0 ) : ?>
				<?php while( $symptom = $symptoms->fetch_object() ) : ?>
				<div class="col-md-3 col-xs-3">

					<div class="form-group">
						<input type="checkbox" id="symptom<?php echo $symptom->symptom_id ?>"
									value="<?php echo $symptom->symptom_id ?>" 
									name="symptom[]"
									<?php
										if($action=="update"){
											$qry_check = "SELECT * FROM illtoms WHERE `symptom_id`=" . $symptom->symptom_id . " AND `illness_id`=" . $illness->illness_id;
											$rslt_check = $DB->query($qry_check);
											if($rslt_check){
												if($rslt_check->num_rows > 0){
													echo " checked ";
												}
											}
										}
									?>
						/>&nbsp;&nbsp;<label title="<?php echo $symptom->description ?>" for="symptom<?php echo $symptom->symptom_id ?>"><?php echo $symptom->name ?></label>
					</div>
				</div>			
				<?php endwhile; ?>
			<?php else : ?>
				<tr>
					<td colspan="4">No Current record.</td>
				</tr>			
			<?php endif; ?>
			
			<div class="col-md-12 col-xs-12">
				<div class="form-group">
					<input type="submit" name="update" value="Submit" class="btn btn-primary pull-right" />		
				</div>
			</div>
		</div>
		</div>
	</form>
</div>