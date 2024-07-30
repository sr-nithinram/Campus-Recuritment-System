<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_mobile = $_POST['c_mobile'];
		$c_address = $_POST['c_address'];
		$c_link = $_POST['c_link'];
		$c_eligiblity = $_POST['c_eligiblity'];
		$date=date('Y-m-d');
		$status=1;
       
         $insert = mysqli_query($conn,"INSERT INTO company
         (c_name,c_email,c_mobile,c_address,c_link,c_eligiblity,date,status) 
         VALUES ('$c_name','$c_email','$c_mobile','$c_address','$c_link','$c_eligiblity','$date',$status)");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../dashboard.php?company=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../dashboard.php?company=success");
         }
     
    }
        
?>