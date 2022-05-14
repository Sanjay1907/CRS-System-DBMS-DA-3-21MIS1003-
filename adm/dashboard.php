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
			<a href="#" class="navbar-brand mr-3"><b>Complaint Mangement System&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sanjay A- 21MIS1003</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
								<th>Name</th>
                                <th>Reg.No</th>
								<th>Complaint Date</th>
								<th>Complaint</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM complaints ORDER BY id DESC";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {	
									?>	
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
                                     <td><?php echo $result['email1']; ?></td>
							 		<td><?php echo $result['complaintdate']; ?></td>
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
                <div class="col-md-2">
					<a href="#" class="btn btn-info btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addUsertModal"><i class="fa fa-th"></i> Total Complaints</a>
				</div>
                <div class="col-md-2">
					<a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addCateModal"><i class="fa fa-check"></i> Solved </a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-danger btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addPostModal"><i class="fa fa-spinner"></i> Unsolved </a>
				</div><br>
				<div class="col-md-2">
					<a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addEmpModal"><i class="fa fa-users"></i> Add Students</a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#viewEmpModal"><i class="fa fa-eye"></i> View Students</a>
				</div>
				<div class="col-md"></div>
			</div>
		</div>
	</section>
    <div class="modal fade" id="addUsertModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info text-white">
					<div class="modal-title">
						<h5>Total Complaints</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>S.no</th>
								<th>Name</th>
								<th>Reg.No</th>
								<th>Complaint Date</th>
								<th>Complaint</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM complaints ORDER BY id DESC";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									 <td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['email1']; ?></td>
							 		<td><?php echo $result['complaintdate']; ?></td>
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
		</div>
	</div>
    <div class="modal fade" id="addCateModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success text-white">
					<div class="modal-title">
						<h5>Solved Complaints</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>S.no</th>
								<th>Name</th>
								<th>Reg.No</th>
								<th>Complaint Date</th>
								<th>Complaint</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM complaints WHERE status = 1";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['email1']; ?></td>
							 		<td><?php echo $result['complaintdate']; ?></td>
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
		</div>
	</div>
    <div class="modal fade" id="addPostModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-danger text-white">
					<div class="modal-title">
						<h5>Unsolved Complaints</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>S.no</th>
								<th>Name</th>
								<th>Reg.No</th>
								<th>Complaint Date</th>
								<th>Complaint</th>
								<th>Status</th>
								<th>Action</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM complaints WHERE status = 0";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['email1']; ?></td>
							 		<td><?php echo $result['complaintdate']; ?></td>
							 		<td><?php echo $result['complaint']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
							 				echo "Unsolved";
							 				?>
							 				</td>
							 		<td>
							 			<form action="accept.php?id=<?php echo $result['id']; ?>" method="POST">
							 				<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
							 				<input type="submit" class="btn btn-sm btn-success" name="approve" value="Solved">
							 			</form>
							 		</td>
							 				<?php
							 			}
							 			else{
							 				echo "Solved";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		
							 	</tr>

							 </tbody>
						</table>
					
				</div>
				
			</form>
			</div>
		</div>
	</div>
    <div class="modal fade" id="addEmpModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Add Students</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="form-control-label">Name</label>
                            <input type="text" name="name" class="form-control" />
                            <div class="form-group">
							<label class="form-control-label">Reg.No</label>
							<input type="text" name="email1" class="form-control" />
						</div>
						<div class="form-group">
							<label class="form-control-label">Password</label>
							<input type="password" name="password" class="form-control" />
						</div>
							<label class="form-control-label">Department</label>
							<select name="department" class="form-control">
                                <option value="CSE">CSE</option>
								<option value="AI">AI</option>
								<option value="MECH">MECH</option>
								<option value="EEE">EEE</option>
								<option value="ECE">ECE</option>
								<option value="CIVIL">CIVIL</option>
								<option value="SOFTWARE ENGINEERING">SOFTWARE ENGINEERING</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" style="border-radius:0%;" data-dismiss="modal">Close</button>
						<input type="hidden" name="status" value="0">
						<input type="submit" class="btn btn-primary" style="border-radius:0%;" name="adduser"  value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
    <div class="modal fade" id="viewEmpModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-warning text-white">
					<div class="modal-title">
						<h5>Manage Students</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>S.no</th>
								<th>Name</th>
                                <th>Reg.No</th>
								<th>Department</th>
								<th>Action</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM users";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
                                     <td><?php echo $result['email1']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
									 <td><a href="deletemp.php?id=<?php echo $result["id"]; ?>"><button type="button" class="btn btn-danger" style="border-radius:0%;">Delete</button></a> </td>
							 	</tr>

							 </tbody>
							 <?php $cnt++; }?>
						</table>
				</div>
				
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
	if (isset($_POST['adduser'])){
		$name = $_POST['name'];
		$department = $_POST['department'];
		$email1 = $_POST['email1'];
		$password = $_POST['password'];

		$password = md5($_POST['password']);


		$sql = "INSERT INTO users(name,department,email1,password)VALUES('$name','$department','$email1','$password')";

		$run = mysqli_query($con,$sql);

		if($run == true){
			
			echo "<script> 
					alert('Student Added);
					window.open('dashboard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed');
			</script>";
		}
	}
	
 ?>
