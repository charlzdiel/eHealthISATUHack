<?php include "./actions/check_user.php"; ?>
<?php 
	if( isset( $_GET["id"] ) ){
		$action = "update";
		$id = $_GET["id"];
		$qry = "SELECT * FROM symptoms WHERE symptom_id='{$id}'";
		$rslt = $DB->query($qry);
		if($rslt){
			$symptom = $rslt->fetch_object();
		} else {
			echo "<h3>Error retrieving the symptom semester.</h3>";
		}
	} else {
		$action = "add";
	}
?>
<div class="row">
	<?php if( $action=="update" ){ echo "<h3>Update Symptom</h3>"; } else { echo "<h3>Add Symptom</h3>"; } ?>
	<form method="POST" action="./actions/symptom_update.php">
		<input type="hidden" name="action" id="action" value="<?php echo $action; ?>" />
		<?php if( $action=="update" ){ echo "<input type='hidden' value='" . $symptom->symptom_id . "' name='symptom_id'>"; } ?>
		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				<label for="symptom_name">Name</label>
				<input required type="text" class="form-control" id="symptom_name" name="symptom_name" value="<?php if( $action=="update" ){ echo $symptom->name; } ?>" />
			</div>
			<div class="form-group">
				<label for="symptom_desc">Description</label>
				<textarea required  class="form-control" id="symptom_desc" name="symptom_desc" value="<?php if( $action=="update" ){ echo $symptom->description; } ?>" /></textarea> 
			</div>
			<input type="submit" name="update" value="Submit" class="btn btn-primary pull-right" />		
		</div>
		</div>
	</form>
</div>