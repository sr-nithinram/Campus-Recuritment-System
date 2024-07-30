<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
		$id=$_POST['c_id'];
       
        $c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_mobile = $_POST['c_mobile'];
		$c_address = $_POST['c_address'];
		$c_link = $_POST['c_link'];
		$c_event = $_POST['c_event'];
		
		$date=date('Y-m-d');
		$status=1;
		
       $update=  mysqli_query($conn,"UPDATE cultural SET c_name='$c_name',c_email='$c_email',c_mobile='$c_mobile',c_address='$c_address',c_link='$c_link',c_event='$c_event',c_udate='$date' WHERE id=$id");
         if(!$update)
         {
             echo mysqli_error($conn);
             header("Location: ../dashboard.php?cultural=uerror");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../dashboard.php?cultural=update");
         }
     
    }
        
?>
