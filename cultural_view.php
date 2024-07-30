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
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" rel="stylesheet" />
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Campus Recruitment System</h4>
              
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
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
             
              <div class="card">
                <div class="card-body">
                  
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Company Name</th>
						  <th>Email</th>
						  <th>Mobile</th>
                          <th>Address</th>
                          <th>Events</th>
						  
                          <th>Status</th>
						  
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $sql="SELECT * from cultural where  del is null ";
					  $result=$con-> query($sql);
					  $count=1;
					  if ($result-> num_rows > 0){
						while ($row=$result-> fetch_assoc()) {
					  if($row['status']==1)
							{
								$status='<button type="button" class="btn btn-success">Active</button>';
							}
							else{
								$status='<button type="button" class="btn btn-danger">InActive</button>';
							}
						
					  ?>
                        <tr>
                          
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['c_name'];?></td>
						  <td><?php echo $row['c_email'];?></td>
						  <td><?php echo $row['c_mobile'];?></td>
						  <td><?php echo $row['c_address'];?></td>
                          <td><?php echo $row['c_event'];?></td>
						
                          <td><?php echo $status;?></td>
						 
                        </tr>
                       	<?php 
					  }}
?>					  
                      </tbody>
                      
                    </table>
					
                  </div>
                </div>
              </div>
			  
	
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
	<!-- Modal -->
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <?php
	
	
require_once("footer.php");

?>
    
    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>
	
	
	
  </body>
</html>
