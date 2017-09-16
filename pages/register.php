
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
<div class="row col-lg-offset-4" >
	<?php if( $action=="update" ){ echo "<h3>Update users</h3>"; } else { echo "<h3>Register here!</h3>"; } ?>
	<form method="POST" action="./actions/register.php" >
		<input type="hidden" name="action" id="action" value="<?php echo $action; ?>" />
		<?php if( $action=="update" ){ echo "<input type='hidden' value='" . $users->user_id . "' name='user_id'>"; } ?>
		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				<label for="user_name">Name</label>
				<input required type="text" class="form-control" id="user_name" name="user_name" value="<?php if( $action=="update" ){ echo $users->name; } ?>" />
			</div>

			<div class="form-group">
				<label for="specialization">Specialization</label>
				<input required type="text" class="form-control" id="specialization" name="specialization" value="<?php if( $action=="update" ){ echo $users->specialization; } ?>" />
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
        		<option value="1">Doctor</option>
        		<option value="2">Patient</option>
       			</select> 
			</div>
			<input type="submit" name="update" value="Submit" class="btn btn-primary pull-right" />		
		</div>
		</div>
	</form>
</div>