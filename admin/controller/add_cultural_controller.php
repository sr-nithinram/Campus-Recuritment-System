<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_mobile = $_POST['c_mobile'];
		$c_address = $_POST['c_address'];
		$c_link = $_POST['c_link'];
		$c_event = $_POST['c_event'];
		$date=date('Y-m-d');
		$status=1;
       
         $insert = mysqli_query($conn,"INSERT INTO cultural
         (c_name,c_email,c_mobile,c_address,c_link,c_event,date,status) 
         VALUES ('$c_name','$c_email','$c_mobile','$c_address','$c_link','$c_event','$date',$status)");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../dashboard.php?cultural=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../dashboard.php?cultural=success");
         }
     
    }
        
?>