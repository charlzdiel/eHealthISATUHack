<!DOCTYPE html>
<html>
<head>
	<title>eHealth Check</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bs/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<script src="assets/js/jquery-2.1.4.min.js"></script>		
</head>
<body>
<nav class="navbar navbar-inverse" style="border-radius:0px;">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><img style="width:20px;height:20px;float:left;margin-right:5px;" src="./assets/img/logo_health.png" />eHealth Check</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar" aria-expanded="true">
			<ul class="nav navbar-nav">
				<?php if( isset( $_SESSION["name"] ) ){ ?>
					<?php if( $_SESSION["acct_type"]==0 ) { ?>
					<li><a href="index.php?page=accounts">Accounts</a></li>
					<li><a href="index.php?page=symptoms">Symptoms</a></li>
					<li><a href="index.php?page=illness">Illness</a></li>
					<?php	} else { ?>
					<li><a href="index.php?page=profile">Profile</a></li>
					<li><a href="index.php?page=appointments">Appointments</a></li>
					<li><a href="index.php?page=diagnosis">Diagnosis</a></li>
					<?php } ?>


				<?php } ?>
			</ul>					     
			<ul class="nav navbar-nav navbar-right" style="margin-right:5px;">
				<?php if( isset( $_SESSION["name"] ) ){ ?>
					<li class="fullname"><a>Welcome <?php echo $_SESSION["name"]; ?> !</a></li>
					<li><a href="./actions/logout.php">Logout</a></li>
				<?php } ?>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
<div class="container">
