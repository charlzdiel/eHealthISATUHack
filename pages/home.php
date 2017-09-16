<?php if( !isset( $_SESSION["userid"] ) ){ ?>
<div class="row">
	<div class="col-md-12 col-xs-12">
		<h1 style="text-align:center;">Health Check</h1>
	</div>
</div>
<?php } ?>
<div class="row">
	<?php if( !isset( $_SESSION["userid"] ) ){ ?>
	<div class="col-md-4 col-md-offset-4 col-xs-12" style="background-color:#efefef; padding:10px;">
		<h3>Login</h3>
		<?php if( isset( $_SESSION["login_error"] ) ){ ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $_SESSION["login_error"]; unset($_SESSION["login_error"]); ?>
		</div>
		<?php } ?>

		<?php if( isset( $_SESSION["register_error"] ) ){ ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $_SESSION["register_error"]; unset($_SESSION["register_error"]); ?>
			</div>
		<?php } ?>
		<?php if( isset( $_SESSION["register_success"] ) ){ ?>
			<div class="alert alert-success" role="alert">
				<?php echo $_SESSION["register_success"]; unset($_SESSION["register_success"]); ?>
			</div>
		<?php } ?>
		<form method="POST" action="./actions/login.php">
			<div class="form-group">
				<input type="text" placeholder="Username" class="form-control" id="username" name="username" />
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" placeholder="Password" class="form-control" id="password" name="password" />
			</div>
			<input type="submit" name="login" value="Login" class="btn btn-success col-md-7 col-md-offset-3" /><br><br>
					<a  class="btn btn-primary  col-md-7 col-md-offset-3" href="index.php?page=register" name="register" style="margin-top:12px;">CREATE NEW ACCOUNT</a>

		</form>
	</div>
	<?php } else{ 
	?>
		<div class="col-md-4 col-md-offset-4 col-xs-12">
			<p style="text-align:center;"><img src="./assets/img/logo_health.png" style="width:150%;height:auto;" /></p>
		</div>
	<?php
	} ?>
</div>