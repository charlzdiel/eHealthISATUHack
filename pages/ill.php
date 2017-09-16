<?php include "./actions/check_user.php"; ?>
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