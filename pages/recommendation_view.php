<?php include "./actions/check_user.php"; ?>


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
<?php
	
	$illness_id = $_GET["id"];
	$qry = "SELECT * FROM illness WHERE `illness_id`={$illness_id} ORDER BY illness_id";
	$rslt = $DB->query($qry);
	if($rslt){
?>

					<?php if($rslt->num_rows>0){ ?>
					<?php
						while( $recommendation = $rslt->fetch_object() ){
					?>

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-xs-6">
					<h3><?php echo $recommendation->name; ?></h3>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
			
				<tbody>

					<tr>
						<td><?php echo $recommendation->description; ?></td>	
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

<br>
<br>

<div class="row">

<?php
	
	$illness_id = $_GET["id"];
	$qry = "SELECT * FROM illtoms INNER JOIN symptoms ON illtoms.symptom_id=symptoms.symptom_id WHERE `illness_id`={$illness_id} ORDER BY illness_id";
	$rslt = $DB->query($qry);
	if($rslt){
?>



	<div class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr style="font-size:20px;">
						<th>Symptoms</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
				<?php if($rslt->num_rows>0){ ?>
					<?php
						while( $recommendation = $rslt->fetch_object() ){
					?>
					<tr>
						<td style=":20px;"><?php echo $recommendation->name; ?></td>	
						<td><?php echo $recommendation->description; ?></td>	
						
					</tr>
					<?php } ?>
					<?php } else { ?>
					<tr>
						<td colspan="4" style="text-align:center;">No record found.</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

<?php } else { ?>
<h3 style="text-align:center;">Error retrieving illness list.</h3>
<?php } ?>
</div>
</div>
		




<?php
	
	$illness_id = $_GET["id"];
	$qry = "SELECT * FROM recommendations WHERE `illness_id`={$illness_id}   ORDER BY r_id";
	$rslt = $DB->query($qry);
	if($rslt){
?>


<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-xs-6">
					<h4>Doctor's Recommendations</h4>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<tbody>
					<?php if($rslt->num_rows>0){ ?>
					<?php
						while( $recommendation = $rslt->fetch_object() ){
					?>

					<tr>
						<td><a  href="index.php"><img style="width:50px;height:50px;float:left;margin-right:5px;" src="./assets/img/doctor.png" /></a><?php echo $recommendation->doctor_id; ?></td>	
						<td><?php echo $recommendation->comments; ?></td>	
						<td>
								<a href="index.php?page=recommendation_view&id=<?php echo $recommendation->illness_id; ?>"><label class="glyphicon glyphicon-thumbs-up" style="color:blue" title="Activate"></label></a> &nbsp&nbsp&nbsp
								<a href="index.php?page=recommendation&id=<?php echo $recommendation->r_id; ?>"><label class="glyphicon glyphicon-thumbs-down" style="color:green;" title="Activate"></label></a>
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



<?php include "./actions/check_user.php"; ?>


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
<?php
	
	$illness_id = $_GET["id"];
	$qry = "SELECT * FROM illness WHERE `illness_id`={$illness_id} ORDER BY illness_id";
	$rslt = $DB->query($qry);
	if($rslt){
?>

					<?php if($rslt->num_rows>0){ ?>
					<?php
						while( $recommendation = $rslt->fetch_object() ){
					?>

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-xs-6">
					<h3><?php echo $recommendation->name; ?></h3>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
			
				<tbody>

					<tr>
						<td><?php echo $recommendation->description; ?></td>	
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

<br>
<br>

<div class="row">

<?php
	
	$illness_id = $_GET["id"];
	$qry = "SELECT * FROM illtoms INNER JOIN symptoms ON illtoms.symptom_id=symptoms.symptom_id WHERE `illness_id`={$illness_id} ORDER BY illness_id";
	$rslt = $DB->query($qry);
	if($rslt){
?>



	<div class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr style="font-size:20px;">
						<th>Symptoms</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
				<?php if($rslt->num_rows>0){ ?>
					<?php
						while( $recommendation = $rslt->fetch_object() ){
					?>
					<tr>
						<td style=":20px;"><?php echo $recommendation->name; ?></td>	
						<td><?php echo $recommendation->description; ?></td>	
						
					</tr>
					<?php } ?>
					<?php } else { ?>
					<tr>
						<td colspan="4" style="text-align:center;">No record found.</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

<?php } else { ?>
<h3 style="text-align:center;">Error retrieving illness list.</h3>
<?php } ?>
</div>
</div>
		




<?php
	
	$illness_id = $_GET["id"];
	$qry = "SELECT * FROM recommendations  INNER JOIN doctor ON recommendations.doctor_id=doctor.doctor_id INNER JOIN users	ON doctor.user_id=users.user_id  WHERE `illness_id`={$illness_id}   ORDER BY r_id";
	$rslt = $DB->query($qry);
	if($rslt){
?>


<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-xs-6">
					<h4>Doctor's Recommendations</h4>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<tbody>
					<?php if($rslt->num_rows>0){ ?>
					<?php
						while( $recommendation = $rslt->fetch_object() ){
					?>

					<tr>
						<td><a  href="index.php"><img style="width:50px;height:50px;float:left;margin-right:5px;" src="./assets/img/doctor.png" /></a>

							<b><?php echo $recommendation->name; ?><b> <br>&nbsp &nbsp &nbsp <?php echo $recommendation->comments; ?></td>	
					
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