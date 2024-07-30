<?php
include_once "../config/dbconnect.php"; 

?>
<div >
  <h2>All Company</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Company Name </th>
        <th class="text-center">Email</th>
        <th class="text-center">Mobile Number</th>
		<th class="text-center">Address</th>
		<th class="text-center">Eligiblity</th>
		<th class="text-center">Link</th>
		<th class="text-center">Student Selected</th>
		<th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
      
      $sql="SELECT * from company where status=1";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["c_name"]?></td>
      <td><?=$row["c_email"]?></td>
      <td><?=$row["c_mobile"]?></td>
      <td><?=$row["c_address"]?></td>
      <td><?=$row["c_eligiblity"]?></td>
	  <td><?=$row["c_link"]?></td>
	  <td><?=$row["c_studentselect"]?></td>
	  <td>
	   <a data-target="#editModal" data-toggle="modal" data-name="<?php echo $row['c_name'];?>" data-id="<?php echo $row['id'];?>"
	   data-email="<?php echo $row['c_email'];?>" data-mobile="<?php echo $row['c_mobile'];?>" data-address="<?php echo $row['c_address'];?>" data-eligiblity="<?php echo $row['c_eligiblity'];?>"
	   data-link="<?php echo $row['c_link'];?>" data-studentselect="<?php echo $row['c_studentselect'];?>" class="modal-trigger"
	   href="#editModal"><i class="fa fa-pencil-square-o border-0" style="font-size:25px;color:blue"></i></a>
	
	  
	  <a href="./controller/delete_company_controller.php?id=<?php echo $row['id'];?>"><i class="fa fa-trash-o" style="font-size:25px;color:red"></i></a>
	  </td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>
  
   <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Company
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Company Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/add_company_controller.php" method="POST">
            <div class="form-group">
              <label for="c_name">Company Name:</label>
              <input type="text" class="form-control" name="c_name" required>
            </div>
			<div class="form-group">
              <label for="c_email">Email:</label>
              <input type="text" class="form-control" name="c_email" required>
            </div>
			<div class="form-group">
              <label for="c_mobile">Mobile:</label>
              <input type="text" class="form-control" name="c_mobile" required>
            </div>
			<div class="form-group">
			<label for="c_address">Address:</label>
			<textarea id="w3review" class="form-control" name="c_address" rows="4" cols="50">
			</textarea>
            </div>
			<div class="form-group">
			<label for="c_eligiblity">Eligibility Criteria:</label>
			<textarea id="w3review" class="form-control" name="c_eligiblity" rows="4" cols="50">
			</textarea>
            </div>
			<div class="form-group">
              <label for="c_link">Link:</label>
              <input type="text" class="form-control" name="c_link" required>
            </div>
			
			
			
			
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Company</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Edit Model Starts-->
  <!-- Modal -->
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Company Details</h4>
		  
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/edit_company_controller.php" method="POST">
            <div class="form-group">
			
			
              <label for="c_name">Company Name:</label>
			  <input type="text" class="form-control" name="c_id" id="c_id">
              <input type="text" class="form-control" name="c_name" id="c_name">
            </div>
			<div class="form-group">
              <label for="c_email">Email:</label>
              <input type="text" class="form-control" name="c_email" id="c_email">
            </div>
			<div class="form-group">
              <label for="c_mobile">Mobile:</label>
              <input type="text" class="form-control" name="c_mobile" id="c_mobile">
            </div>
			<div class="form-group">
			<label for="c_address">Address:</label>
			<textarea id="c_address" class="form-control" name="c_address" rows="4" cols="50">
			</textarea>
            </div>
			<div class="form-group">
			<label for="c_address">Eligibility Criteria:</label>
			<textarea id="c_eligiblity" class="form-control" name="c_eligiblity" rows="4" cols="50">
			</textarea>
            </div>
			<div class="form-group">
              <label for="c_link">Link:</label>
              <input type="text" class="form-control" name="c_link" id="c_link">
            </div>
			
			<div class="form-group">
              <label for="c_studentselect">Student Selected:</label>
              <input type="text" class="form-control" name="c_studentselect" id="c_studentselect">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Update Company</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Edit Model Ends-->
  
  </div>
  
  
  
  <script>
  $(document).on("click", ".modal-trigger", function () {
  var c_id = $(this).data('id');
  var c_name = $(this).data('name');
  var c_email = $(this).data('email');
  var c_mobile = $(this).data('mobile');
  var c_address = $(this).data('address');
  var c_link = $(this).data('link');
  var c_studentselect= $(this).data('studentselect');
  var c_eligiblity= $(this).data('eligiblity');
  $("#c_id").val(c_id);
  $("#c_name").val(c_name);
  $("#c_email").val(c_email);
  $("#c_mobile").val(c_mobile);
  $("#c_address").val(c_address);
  $("#c_link").val(c_link);
  $("#c_eligiblity").val(c_eligiblity);
  $("#c_studentselect").val(c_studentselect);
  
});
  </script>
  