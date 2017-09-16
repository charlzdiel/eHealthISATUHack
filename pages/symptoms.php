<?php include "./actions/check_user.php"; ?>

<?php
	
	$qry = "SELECT * FROM symptoms ORDER BY name";
	$rslt = $DB->query($qry);
	if($rslt){
?>

<?php if( isset( $_SESSION["symptom_error"] ) ){ ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $_SESSION["symptom_error"]; unset($_SESSION["symptom_error"]); ?>
	</div>
<?php } ?>
<?php if( isset( $_SESSION["symptom_success"] ) ){ ?>
	<div class="alert alert-success" role="alert">
		<?php echo $_SESSION["symptom_success"]; unset($_SESSION["symptom_success"]); ?>
	</div>
<?php } ?>

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-6 col-xs-6">
					<h3>Symptoms</h3>
				</div>
				<div class="col-md-6 col-xs-6">
					<a class="btn btn-success btn-large pull-right" href="index.php?page=symptom" style="margin-top:12px;">Add Symptom</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th style="width:10%;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if($rslt->num_rows>0){ ?>
					<?php
						while( $symptom = $rslt->fetch_object() ){
					?>
					<tr>
						<td><?php echo $symptom->name; ?></td>	
						<td><?php echo $symptom->description; ?></td>	
						<td>
								<a href="index.php?page=symptom&id=<?php echo $symptom->symptom_id; ?>"><label class="glyphicon glyphicon-pencil" style="color:green;" title="Activate"></label></a>
								<a class="delete" href="./actions/symptom_delete.php?&id=<?php echo $symptom->symptom_id; ?>"><label class="glyphicon glyphicon-remove" style="color:red;" title="Delete"></label></a>
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
<h3 style="text-align:center;">Error retrieving symptoms list.</h3>
<?php } ?>