<?php include "./actions/check_user.php"; ?>

<?php
	
	$qry = "SELECT * FROM users ORDER BY user_id";
	$rslt = $DB->query($qry);
	if($rslt){
?>

<?php if( isset( $_SESSION["users_error"] ) ){ ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $_SESSION["users_error"]; unset($_SESSION["users_error"]); ?>
	</div>
<?php } ?>
<?php if( isset( $_SESSION["users_success"] ) ){ ?>
	<div class="alert alert-success" role="alert">
		<?php echo $_SESSION["users_success"]; unset($_SESSION["users_success"]); ?>
	</div>
<?php } ?>

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-6 col-xs-6">
					<h3>Users</h3>
				</div>
				<div class="col-md-6 col-xs-6">
					<a class="btn btn-success btn-large pull-right" href="index.php?page=account" style="margin-top:12px;">Add Account</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Name</th>
						<th>Username</th>
						<th>Password</th>
						<th>Account Type</th>
						<th style="width:10%;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if($rslt->num_rows>0){ ?>
					<?php
						while( $users = $rslt->fetch_object() ){
					?>
					<tr>
						<td><?php echo $users->name; ?></td>	
						<td><?php echo $users->username; ?></td>	
						<td><?php echo $users->password; ?></td>	
					<td><?php if ( $users->acct_type==0) {
						echo "Admin";
					}elseif ($users->acct_type==1) {
						echo "Doctor";
					}elseif ($users->acct_type==2) {
						echo "Patient";
					} ?></td>
						<td>
								<a href="index.php?page=account&id=<?php echo $users->user_id; ?>"><label class="glyphicon glyphicon-pencil" style="color:green;" title="Activate"></label></a>
								<a class="delete" href="./actions/account_delete.php?&id=<?php echo $users->user_id; ?>"><label class="glyphicon glyphicon-remove" style="color:red;" title="Delete"></label></a>
						</td>	
					</tr>
					<?php } ?>
					<?php } else { ?>
					<tr>
						<td colspan="5" style="text-align:center;">No record found.</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php } else { ?>
<h3 style="text-align:center;">Error retrieving users list.</h3>
<?php } ?>