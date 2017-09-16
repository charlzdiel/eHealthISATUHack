<?php include "./actions/check_user.php"; ?>
<?php 
	if( isset( $_GET["id"] ) ){
		$action = "update";
		$id = $_GET["id"];
		$qry = "SELECT * FROM recommendations WHERE r_id='{$id}'";
		$rslt = $DB->query($qry);
		if($rslt){
			$recommendation = $rslt->fetch_object();
		} else {
			echo "<h3>Error retrieving the recommendations.</h3>";
		}
	} else {
		$action = "add";
	}
?>
<div class="row">
	<?php if( $action=="update" ){ echo "<h3>Update Recommendation</h3>"; } else { echo "<h3>Add Recommendation</h3>"; } ?>
	<form method="POST" action="./actions/recommendation_update.php">
		<input type="hidden" name="action" id="action" value="<?php echo $action; ?>" />
		<?php if( $action=="update" ){ echo "<input type='hidden' value='" . $recommendation->r_id . "' name='r_id'>"; } ?>
		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				<label for="doctor_name">Doctor</label>
				<input required type="text" class="form-control" id="doctor_name" name="doctor_name" value="<?php if( $action=="update" ){ echo $recommendation->doctor_id; } ?>" />
			</div>
			<div class="form-group">
				<label for="illness_name">Illnes</label>
				<input required type="text" class="form-control" id="illness_name" name="illness_name" value="<?php if( $action=="update" ){ echo $recommendation->illness_id; } ?>" />
			</div>
			<div class="form-group">
				<label for="comment">Comments</label>
				<input required type="text" class="form-control" id="comment" name="comment" value="<?php if( $action=="update" ){ echo $recommendation->comments; } ?>" />
			</div>
			<input type="submit" name="update" value="Submit" class="btn btn-primary pull-right" />		
		</div>
		</div>
	</form>
</div>