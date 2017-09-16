<?php include "./actions/check_user.php"; ?>
<?php 
	if( isset( $_GET["id"] ) ){
		$action = "update";
		$id = $_GET["id"];
		$qry = "SELECT * FROM users WHERE user_id='{$id}'";
		$rslt = $DB->query($qry);
		if($rslt){
			$users = $rslt->fetch_object();
		} else {
			echo "<h3>Error retrieving the user.</h3>";
		}
	} else {
		$action = "add";
	}
?>
<div class="row ">
	<form method="POST" action="./actions/user_update.php">
		<input type="hidden" name="action" id="action" value="<?php echo $action; ?>" />
		<?php if( $action=="update" ){ echo "<input type='hidden' value='" . $users->user_id . "' name='user_id'>"; } ?>
		<div class="col-md-6 col-xs-12 col-lg-offset-3">

			<div class="form-group">
				<a  href="index.php"><img style="width:100px;height:100px;text-align:center;margin-right:5px;" src="./assets/img/users.png" /></a>
					<?php if( $action=="update" ){ echo "<h3>Update users</h3>"; } else { echo "<h3 >Profile</h3>"; } ?>
			</div>
			<div class="form-group">
				<label for="user_name">Name</label>
				<input required type="text" class="form-control" id="user_name" name="user_name" value="<?php if( $action=="update" ){ echo $users->name; } ?>" />
			</div>
			<div class="form-group">
				<label for="user_name">Username</label>
				<input required type="text" class="form-control" id="username" name="username" value="<?php if( $action=="update" ){ echo $users->username; } ?>" />
			</div>
			<div class="form-group">
				<label for="user_name">Password</label>
				<input required type="text" class="form-control" id="password" name="password" value="<?php if( $action=="update" ){ echo $users->password; } ?>" />
			</div>
			<div class="form-group">
				<label for="user_name">Type of User</label>
				<select class="form-control" id="acct_type" name="acct_type">
        	<option <?php if( $action=="update" ){ if($users->acct_type==0){ echo " selected "; } } ?> value="0">Admin</option>
        	<option <?php if( $action=="update" ){ if($users->acct_type==1){ echo " selected "; } } ?> value="1">Doctor</option>
        	<option <?php if( $action=="update" ){ if($users->acct_type==2){ echo " selected "; } } ?>value="2">Patient</option>
       	</select> 
			</div>
			<div class="form-group">
				<label for="specialization">Specialization</label>
				<?php if($action=="update"){ if( $users->acct_type==1){ $spec = $DB->query("SELECT specialization FROM doctor WHERE user_id=" . $users->user_id)->fetch_object(); } } ?>
				<input required type="text" class="form-control" id="specialization" name="specialization" <?php if( $action=="update" ){ if( $users->acct_type==1){ echo "value='" . $spec->specialization . "'"; } else { echo " disabled "; } } if($action=="add"){ echo " disabled "; } ?> />
			</div>
			<input type="submit" name="update" value="Submit" class="btn btn-primary pull-right" />		
		</div>
		</div>
	</form>
</div>