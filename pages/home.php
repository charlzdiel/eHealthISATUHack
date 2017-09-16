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
		<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="./assets/img/logo_health.png" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          
        </div>
      </div>

      <div class="item">
        <img src="./assets/img/kids.jpg" alt="kids" style="width:100%;">
        <div class="carousel-caption">
          <h3>Convenient</h3>
          
        </div>
      </div>
    
      <div class="item">
        <img src="./assets/img/dacs.jpg" alt="Dacs" style="width:100%;">
        <div class="carousel-caption">
          <h3>Online Consultation</h3>
         
        </div>
      </div>

      <div class="item">
        <img src="./assets/img/pre.jpg" alt="pre" style="width:100%;">
        <div class="carousel-caption">
          <h3>Online Consultation</h3>
         
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>

	<?php
	} ?>
</div>