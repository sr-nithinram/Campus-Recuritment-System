<?php
session_start();
require_once("./config/dbconnect.php");
if(isset($_POST['fetch'])){
      //extract($_POST);
      //print_r($_POST);
      
        $admin_email = htmlspecialchars(trim($_POST['admin_email']));
        $admin_password = htmlspecialchars(trim($_POST['admin_password']));
		
		
        $logincheck = "SELECT id, admin_name, admin_email, admin_password FROM admin WHERE admin_email='$admin_email' and admin_password='$admin_password'";
		
		$result = mysqli_query($conn, $logincheck);
		$rowcount=mysqli_num_rows($result);
		//echo "row_". $rowcount;
		if ($rowcount > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$_SESSION["user_name"] = $row['admin_name'];
				$_SESSION["id"]=$row['id'];
				
				echo "<script type='text/javascript'>window.top.location='dashboard.php';</script>"; exit;
			}
        
        }
        else{
			$_SESSION["worng"]=1;
			echo "<script type='text/javascript'>window.top.location='index.php';</script>";
			exit();
         
         // echo '<div class="alert alert-danger">User Name Or Password Is Incorrect</div>';
       
        
       
        }
    }
?>