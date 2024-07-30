<?php
session_start();
require_once("db.php");
$f_name=$_POST['f_name'];
$f_email=$_POST['f_email'];
$f_course=$_POST['f_course'];
$f_password=$_POST['f_password'];
$date=date("Y-m-d");
$status=1;
$sql="INSERT INTO `student`(`f_name`, `f_course`, `f_email`, `f_password`, `date`,  `status`) VALUES ('$f_name','$f_course','$f_email','$f_password','$date','$status')";
$qry=mysqli_query($con,$sql);
if ($qry==TRUE) {
    echo '<script>alert("Registration Sucesfull Please Login to Continue.")</script>';
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
		 echo "<script>window.location.href ='index.php'</script>";
    }

?>