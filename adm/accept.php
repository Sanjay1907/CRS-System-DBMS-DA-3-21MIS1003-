<?php
	include'config.php'; 
	if (isset($_POST['approve'])){
		$appid = $_POST['appid'];
		$sql = "UPDATE complaints SET status='1' WHERE id = '$appid'";
		$run = mysqli_query($con,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Complaint Solved');
					window.open('dashboard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Complaint Application Failed');
			</script>";
		}
	}
	
 ?>