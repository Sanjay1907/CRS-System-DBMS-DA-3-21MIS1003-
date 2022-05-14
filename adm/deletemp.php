<?php
include('config.php'); 
$sql = "DELETE FROM users WHERE id='" . $_GET["id"] . "'";

$run = mysqli_query($con,$sql);

if($run == true){
			
    echo "<script> 
            alert('Student Removed from Database');
            window.open('dashboard.php','_self');
          </script>";
}else{
    echo "<script> 
    alert('Student Deletion Failed');
    </script>";
}

mysqli_close($con);
?>