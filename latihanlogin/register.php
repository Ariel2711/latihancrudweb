<?php
require "config.php";
if(isset($_POST["submit"])){
	$username = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirmpassword = $_POST["confirmpassword"];
	$duplicate = mysqli_query($conn, "select * from user where username = '$username' or email = '$email'");
	if(mysqli_num_rows($duplicate) > 0){
		echo 
		"<script>alert('Username or Email already used')</script>";
	}else{
		if($password == $confirmpassword){
			$query = "insert into user values ('', '$username', '$email', '$password')";
			mysqli_query($conn, $query);
			echo 
			"<script>alert('Registration success')</script>";
			header("Location: index.php");
		}else{
			echo 
			"<script>alert('Password dont match')</script>";
		}
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="https://cdn-icons-png.flaticon.com/512/6681/6681204.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body px-5 py-3">
							<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
							<form method="POST" class="needs-validation" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Name</label>
									<input id="name" type="text" class="form-control" name="name" value="" required autofocus>
									<div class="invalid-feedback">
										Name is required	
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Confirm Password</label>
									<input id="confirmpassword" type="password" class="form-control" name="confirmpassword" required>
								    <div class="invalid-feedback">
								    	Confirm Password is required
							    	</div>
								</div>

								<p class="form-text text-muted mb-3">
									By registering you agree with our terms and condition.
								</p>

								<div class="align-items-center d-flex">
									<button type="submit" name="submit" class="btn btn-primary ms-auto">
										Register	
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Already have an account? <a href="index.php" class="text-dark">Login</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2023 &mdash; ArielNP 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/bootstrap.min.js"></script>
</body>
</html>