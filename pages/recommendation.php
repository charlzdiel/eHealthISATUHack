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
	<?php echo "<h3>Add Recommendation</h3>"; ?>
	<form method="POST" action="./actions/recommendation_update.php">
		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				<label for="doctor_name">Doctor</label>
				<input type="hidden" name="user_id" value="<?php echo $_SESSION['userid']; ?>" />
				<input readonly required type="text" class="form-control" id="doctor_name" name="doctor_name" value="<?php echo $_SESSION['name'] ?>" />
			</div>
			<div class="form-group">
				<label for="illness_name">Illnes</label>
				<input type="hidden" name="illness_id" value="<?php echo $_GET['illness']; ?>" />
				<input readonly required type="text" class="form-control" id="illness_name" name="illness_name" value="<?php $illness=$DB->query('SELECT * FROM illness WHERE illness_id=' . $_GET['illness']); $ill=$illness->fetch_object(); echo $ill->illness_name; ?>" />
			</div>
			<div class="form-group">
				<label for="comment">Comments</label>
				<input required type="text" class="form-control" id="comment" name="comment" />
			</div>
			<input type="submit" name="update" value="Submit" class="btn btn-primary pull-right" />		
		</div>
		</div>
	</form>
</div>