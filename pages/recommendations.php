<?php include "./actions/check_user.php"; ?>

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
					<h3>Comments</h3>
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