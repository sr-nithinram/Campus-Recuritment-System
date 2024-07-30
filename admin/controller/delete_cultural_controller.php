<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_GET['id']))
    {
		$id=$_GET['id'];
        $status=2;
		$del=1;
		
       $update=  mysqli_query($conn,"UPDATE cultural SET status=$status,del=$del WHERE id=$id");
	   
        if(!$update)
         {
             echo mysqli_error($conn);
             header("Location: ../dashboard.php?cultural=derror");
         }
         else
         {
             echo "Records Deleted successfully.";
             header("Location: ../dashboard.php?cultural=delete");
         }
         }
     
    
        
?>
