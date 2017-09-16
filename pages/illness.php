<?php include "./actions/check_user.php"; ?>

<?php
	
	$qry = "SELECT * FROM illness ORDER BY name";
	$rslt = $DB->query($qry);
	if($rslt){
?>

<?php if( isset( $_SESSION["illness_error"] ) ){ ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $_SESSION["illness_error"]; unset($_SESSION["illness_error"]); ?>
	</div>
<?php } ?>
<?php if( isset( $_SESSION["illness_success"] ) ){ ?>
	<div class="alert alert-success" role="alert">
		<?php echo $_SESSION["illness_success"]; unset($_SESSION["illness_success"]); ?>
	</div>
<?php } ?>

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-6 col-xs-6">
					<h3>Illness</h3>
				</div>
				<div class="col-md-6 col-xs-6">
					<a class="btn btn-success btn-large pull-right" href="index.php?page=ill" style="margin-top:12px;">Add Illness</a>
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
						while( $illness = $rslt->fetch_object() ){
					?>
					<tr>
						<td><?php echo $illness->name; ?></td>	
						<td><?php echo $illness->description; ?></td>	
						<td>
								<a href="index.php?page=ill&id=<?php echo $illness->illness_id; ?>"><label class="glyphicon glyphicon-pencil" style="color:green;" title="Activate"></label></a>
								<a class="delete" href="./actions/illness_delete.php?&id=<?php echo $illness->illness_id; ?>"><label class="glyphicon glyphicon-remove" style="color:red;" title="Delete"></label></a>
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
<h3 style="text-align:center;">Error retrieving illness list.</h3>
<?php } ?>