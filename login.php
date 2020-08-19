<?php

	include('site-config.php'); 

	if($loggedInUserDetailsArr = $func->sessionExists()){
		header("location: dashboard-engage.php");
		exit();
	}
	
	if(isset($_POST['submit'])){

		$email = $func->escape_string($func->strip_all($_POST['email']));
		$password = $func->escape_string($func->strip_all($_POST['password']));

		$query = "select * from registration where email='".$email."' and password='".$password."' ";
		$result = $func->query($query);
		$data = $func->fetch($result);
		$count = $result->num_rows;

		if($count != 0 ){
			session_start();
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['user_name'] = $data['name'];
            header("location: index.php");
		}else{
			header("location: login.php?failed");
		}
			
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
			<?php if(isset($_GET['success'])) { ?>
				<div class="alert alert-success">
					<strong>Registration Successful!</strong> Please Login.
				</div>
			<?php } ?>

			<?php if(isset($_GET['failed'])) { ?>
				<div class="alert alert-danger">
					<strong>Login Failed!</strong> Please Try Again.
				</div>
			<?php } ?>

			<form role="form" method="post">
                <div class="form-group">
					<label for="emailid">
						Email-Id
					</label>
					<input type="text" name="email" class="form-control" id="email" />
                </div>
                <div class="form-group">
					<label for="password">
						Password
					</label>
					<input type="password" name="password" class="form-control" id="password" />
				</div>
                <center><button type="submit" name="submit" class="btn btn-primary">
					Submit
				</button></center>
                <br>New User!<a href="registration.php">Register</a></center>
			</form>
		</div>
	</div>
</div>
</body>

</html>
