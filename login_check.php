<?php
session_start();
require_once("db.php");
if(isset($_POST['fetch'])){
      //extract($_POST);
      //print_r($_POST);
	  //echo $_POST['optradio'];
	$f_email = htmlspecialchars(trim($_POST['f_email']));
        $f_password = htmlspecialchars(trim($_POST['f_password']));	  
      
        $logincheck = "SELECT id, f_name, f_email, f_password FROM student WHERE f_email='$f_email' and f_password='$f_password'";
		
		$result = mysqli_query($con, $logincheck);
		$rowcount=mysqli_num_rows($result);
		//echo "row_". $rowcount;
		if ($rowcount > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$_SESSION["user_name"] = $row['f_name'];
				$_SESSION["id"]=$row['id'];
				
				echo "<script type='text/javascript'>window.top.location='dash.php';</script>"; exit;
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