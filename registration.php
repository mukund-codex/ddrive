<?php

	include('site-config.php'); 

	if($loggedInUserDetailsArr = $func->sessionExists()){
		header("location: dashboard-engage.php");
		exit();
	}
	
	if(isset($_POST['submit'])){
		
		$func->registration($_POST);
        header("location: login.php?success");

	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Ddriversion</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">

<style>
	.bg-image {
  background-image: url("img/bg.jpg"); /* The image used */
  background-color: #FFFFFF; /* Used if the image is unavailable */
  height: auto; /* You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}
</style>

</head>

<body class="bg-image">
<div class="container pt-2 pb-5">
	<div class="row">
		<div class="col-1 col-md-4"></div>
	   <div class="col-10 col-md-4 col-sm-6 loginbox pb-3">
	   	<br>
			<h4>Welcome in Ddrive Grocery we will make the easy way of your needs.</h4>
			<hr>
			<form role="form" method="post">
				<div class="form-group">
					<label for="name">
						Full Name
					</label>
					<input type="text" name="name" class="form-control" id="name" />
				</div>
				<div class="form-group">
					<label for="mobile">
						Mobile No.
					</label>
					<input type="text" name="mobile" class="form-control" id="mobile" />
				</div>
                <div class="form-group">
					<label for="email">
						Email-Id
					</label>
					<input type="text" name="email" class="form-control" id="email" />
				</div>
                <div class="form-group">
					<label for="address">
						Address
					</label>
                    <textarea id="address" class="form-control" name="address" id="address" rows="4" cols="50">
                    </textarea>
				</div>
				<div class="form-group">
					<label for="password">
						Password
					</label>
					<input type="password" name="password" class="form-control" id="password" />
				</div>
				<center><button type="submit" name="submit" id="submit" class="btn btn-primary">
					Submit
				</button>
				<br>Already registered User!<a href="login.php">Sign In</a></center>
			</form>
		</div>
	</div>
</div>
</body>

</html>
