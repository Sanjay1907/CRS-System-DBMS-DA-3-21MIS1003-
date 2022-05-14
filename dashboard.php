<?php 
	include('head.php'); 
	session_start();
	if (isset($_SESSION['email1'])) {	
	}
	else{
		header('location:index.php');
	}
?>
<body>
	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0"><br><br><br>
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="#" class="navbar-brand mr-3"><b>Complaint Register System&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sanjay A- 21MIS1003</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<div class="collapse navbar-collapse" id="mynavbar">
				<ul class="navbar-nav">
					<li class="nav-item px-2"><a href="#" class="nav-link active">Logged in as <?php echo $_SESSION['email1']?></a></li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown mr-3">
						<li class="nav-item">
							<a href="logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a>
						</li>
					</li>
				</ul>
			</div>
		</div>
	</nav><br><br>
	<section id="post">
		<div class="container">
			<div class="row">
			<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>S.no</th>
								<th>Complaint Date</th>
								<th>Name</th>
								<th>Complaint</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM complaints WHERE email1='".$_SESSION['email1']."'";
									$que = mysqli_query($con,$sql);
									$cnt=1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>
							 	<tr>
									<td><?php echo $cnt;?></td>
									<td><?php echo $result['complaintdate']; ?></td>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['complaint']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
							 				echo "<span class='badge badge-danger'>Unsolved</span>";
							 			}
							 			else{
							 				echo "<span class='badge badge-success'>Solved</span>";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		</td>
							 	</tr>

							 </tbody>
						</table>
			</div>
		</div>
	</section><br><br>
	<section id="sections" class="py-4 mb-4">
		<div class="container">
			<div class="row">
				<div class="col-md"></div>
				<div class="col-md-3">
					<a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#addPostModal"><i class="fa fa-plus"></i> Register Complaint</a>
				</div>
				<div class="col-md"></div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="addPostModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-danger text-white">
					<div class="modal-title">
						<h5>Register Complaint</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="form-control-label">Name</label>
							<input type="text" name="name" class="form-control"/>
							<input type="hidden" name="email1" value="<?php echo $_SESSION['email1']?>">
							<div class="form-group">
							<label class="form-control-label">Complaint Date</label>
							<input type="date" name="complaintdate" class="form-control" />
						    </div>
							<label class="form-control-label">Department</label>
							<select name="department" class="form-control" >
								<option value="CSE">CSE</option>
								<option value="AI">AI</option>
								<option value="MECH">MECH</option>
								<option value="EEE">EEE</option>
								<option value="ECE">ECE</option>
								<option value="CIVIL">CIVIL</option>
								<option value="SOFTWARE ENGINEERING">SOFTWARE ENGINEERING</option>
							</select>
						</div>
						<div class="form-group">
							<label>Brief Complaint</label>
							<textarea name="editor1" class="form-control"></textarea>
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-warning" style="border-radius:0%;" data-dismiss="modal">Close</button>
					<input type="hidden" name="status" value="0">
					<input type="submit" class="btn btn-danger" style="border-radius:0%;" name="apply"  value="Send">
				</div>
			</form>
			</div>
		</div>
	</div>
<script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
<script> CKEDITOR.replace('editor1'); </script>
</body>
</html>
<?php 
	if (isset($_POST['apply'])){
		$name = $_POST['name'];
        $email1 = $_POST['email1'];
		$department = $_POST['department'];
		$complaintdate = $_POST['complaintdate'];
		$editor1 = $_POST['editor1'];
		$status = $_POST['status'];
		$sql = "INSERT INTO complaints(name,email1,department,complaintdate,complaint,status)VALUES('$name','$email1','$department','$complaintdate','$editor1','$status')";
		$run = mysqli_query($con,$sql);
		if($run == true){	
			echo "<script> 
					alert('Complaint sent succesfully');
					window.open('dashboard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Application Failed');
			</script>";
		}
	}
 ?>