<?php 
include('head.php'); 
?>
<body>
	<link rel="stylesheet" href="css/bootstrap.css">
	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button><br><br><br>
			<a href="index.php" class="navbar-brand mr-3"><b>Complaint Mangement System&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sanjay A- 21MIS1003</b></a>
		</div>
	</nav><br><br>
	<section id="post">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card">
						<div class="card-header">
							<h5>Admin Login</h5>
						</div>
						<div class="card-body p-3">
							<form action="" method="POST">
								<label class="form-control-label">Admin No</label>
								<input type="text" name="email1" class="form-control"  />
								<br />
								<label class="form-control-label">Password</label>
								<input type="password" name="password" class="form-control"  />
								<br />
								<input type="submit" name="submit" class="btn btn-primary" value="Log In" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<style>
		.card-header{
			background:black;
			color:white;
			text-align:center;
		}
		.card{
			background:gray;
		}
	</style>
<script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
<script> CKEDITOR.replace('editor1'); </script>
</body>
</html>
<?php 
	
	if(isset($_POST['submit'])){
		$user = $_POST['email1'];
		$password = $_POST['password'];

		$password = md5($_POST['password']);

		include 'config.php';

		$sql = "SELECT * FROM admin WHERE email1 = '$user' AND password = '$password'";

		$run = mysqli_query($con,$sql);
		$check = mysqli_num_rows($run);

		if($check == 1){
			session_start();
			$_SESSION['email1'] = $user; 
			echo "<script> 
					window.open('dashboard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Admin.No or Password Invaild');
			window.open('index.php','_self');
			</script>";
		}
	}

 ?>