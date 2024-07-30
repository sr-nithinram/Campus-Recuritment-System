<?php
require_once("header.php");
require_once("db.php");
if(isset($_SESSION["id"]))
{
$id=$_SESSION["id"];
echo "sesion_id".$id;
}
else{
	echo "session not created";
}
?>

     
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-view-dashboard"></i>
                  </h1>
                  <h6 class="text-white">Total Company</h6>
				  <?php 
				 
					
					  $sql="SELECT * from company where del is NULL";
					  $result=$con-> query($sql);
					  $total_que=mysqli_num_rows($result);
					 ?>
				  <h2 style="color:#ffffff"><?php echo $total_que;?></h2>
                </div>
              </div>
            </div>
          
            
          </div>
          <!-- ============================================================== -->
         
            
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
		
		<?php
            if (isset($_GET['supplier']) && $_GET['supplier'] == "success") {
                echo '<script> alert("Supplier Successfully Added")</script>';
            }else if (isset($_GET['supplier']) && $_GET['supplier'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
			if (isset($_GET['supplier']) && $_GET['supplier'] == "update") {
                echo '<script> alert("Supplier Successfully Updated")</script>';
            }else if (isset($_GET['supplier']) && $_GET['supplier'] == "uerror") {
                echo '<script> alert("Updating Unsuccess")</script>';
            }
			if (isset($_GET['supplier']) && $_GET['supplier'] == "delete") {
                echo '<script> alert("Supplier Successfully Deleted")</script>';
            }else if (isset($_GET['supplier']) && $_GET['supplier'] == "derror") {
                echo '<script> alert("Deleted Unsuccess")</script>';
            }
            if (isset($_GET['farmer']) && $_GET['farmer'] == "success") {
                echo '<script> alert("Farmer Question Added")</script>';
            }else if (isset($_GET['farmer']) && $_GET['farmer'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
			if (isset($_GET['farmer']) && $_GET['farmer'] == "update") {
                echo '<script> alert("Farmer Question Successfully Updated")</script>';
            }else if (isset($_GET['farmer']) && $_GET['farmer'] == "uerror") {
                echo '<script> alert("Updating Unsuccess")</script>';
            }
			if (isset($_GET['farmer']) && $_GET['farmer'] == "delete") {
                echo '<script> alert("Farmer Successfully Deleted")</script>';
            }else if (isset($_GET['farmer']) && $_GET['farmer'] == "derror") {
                echo '<script> alert("Deleted Unsuccess")</script>';
            }
        ?>
       <?php
require_once("footer.php");

?>