<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_GET['id']))
    {
		$id=$_GET['id'];
        $status=2;
		$del=1;
		
       $update=  mysqli_query($conn,"UPDATE company SET status=$status,del=$del WHERE id=$id");
	   
        if(!$update)
         {
             echo mysqli_error($conn);
             header("Location: ../dashboard.php?company=derror");
         }
         else
         {
             echo "Records Deleted successfully.";
             header("Location: ../dashboard.php?company=delete");
         }
         }
     
    
        
?>
