<?php
require "config.php";
if(isset($_POST["submit"])){
	$email = $_POST["email"];
	$password = $_POST["password"];
	$result = mysqli_query($conn, "select * from user where email = '$email' and password = '$password'");
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) > 0){
    $_SESSION["login"] = true;
	$_SESSION["id"] = $row["id"];
	header("Location: home.php");
	}else{
		echo 
			"<script>alert('Email or password invalid')</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
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
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
							<form method="POST" class="needs-validation" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Email Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
										<a href="#" class="float-end">
											Forgot Password?
										</a>
									</div>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Remember Me</label>
									</div>
									<button type="submit" name="submit" class="btn btn-primary ms-auto">
										Login
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account? <a href="register.php" class="text-dark">Create One</a>
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