<?php include "./actions/check_user.php"; ?>
<?php 
	if( isset( $_GET["id"] ) ){
		$action = "update";
		$id = $_GET["id"];
		$qry = "SELECT * FROM diagnosis	WHERE diag_id='{$id}'";
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
			<div class="row">
				<h1><?php $illness = $DB->query("SELECT `name` from illness WHERE illness_id=" . $diagnosis->illness_id); $ill = $illness->fetch_object(); echo $ill->name; ?></h1>
				<h2><?php $user = $DB->query("SELECT `user_id` from patient WHERE patient_id=" . $diagnosis->patient_id); $us = $user->fetch_object(); $patient = $DB->query("SELECT `name` from users WHERE user_id=" . $us->user_id); $pat = $patient->fetch_object(); echo $pat->name;  ?></h2>
			</div>


<?php
	
	$qry = "SELECT * FROM recommendations WHERE illness_id=" . $diagnosis->illness_id . " ORDER BY r_id";
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
					<a class="btn btn-success btn-large pull-right" href="index.php?page=recommendation&illness=<?php echo $diagnosis->illness_id; ?>&doctor=<?php echo $_SESSION['userid']; ?>" style="margin-top:12px;">Add Recommendations</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Doctors Name</th>
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
						<td><?php echo $recommendation->comments; ?></td>	
						<td>
								<!-- <a class="delete" href="./actions/recommendation_add.php?&id=<?php //echo $recommendation->r_id; ?>"><label class="glyphicon glyphicon-eye-open" style="color:green;" title="Delete"></label></a> -->
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
</div>