<?php
include_once "../config/dbconnect.php"; 

?>
<div >
  <h2>All Cultural</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">College Name </th>
        <th class="text-center">Email</th>
        <th class="text-center">Mobile Number</th>
		<th class="text-center">Address</th>
		<th class="text-center">Events</th>
		<th class="text-center">Link</th>
		<th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
      
      $sql="SELECT * from cultural where status=1";
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
      <td><?=$row["c_event"]?></td>
	  <td><?=$row["c_link"]?></td>
	 
	  <td>
	   <a data-target="#editModal" data-toggle="modal" data-name="<?php echo $row['c_name'];?>" data-id="<?php echo $row['id'];?>"
	   data-email="<?php echo $row['c_email'];?>" data-mobile="<?php echo $row['c_mobile'];?>" data-address="<?php echo $row['c_address'];?>" data-event="<?php echo $row['c_event'];?>"
	   data-link="<?php echo $row['c_link'];?>" class="modal-trigger"
	   href="#editModal"><i class="fa fa-pencil-square-o border-0" style="font-size:25px;color:blue"></i></a>
	
	  
	  <a href="./controller/delete_cultural_controller.php?id=<?php echo $row['id'];?>"><i class="fa fa-trash-o" style="font-size:25px;color:red"></i></a>
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
    Add Cultural
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Cultural Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/add_cultural_controller.php" method="POST">
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
			<label for="c_event">Events:</label>
			<textarea id="w3review" class="form-control" name="c_event" rows="4" cols="50">
			</textarea>
            </div>
			<div class="form-group">
              <label for="c_link">Link:</label>
              <input type="text" class="form-control" name="c_link" required>
            </div>
			
			
			
			
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Cultural</button>
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
          <h4 class="modal-title">Edit Cultural Details</h4>
		  
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/edit_cultural_controller.php" method="POST">
            <div class="form-group">
			
			
              <label for="c_name">College Name:</label>
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
			<label for="c_event">Events:</label>
			<textarea id="c_event" class="form-control" name="c_event" rows="4" cols="50">
			</textarea>
            </div>
			<div class="form-group">
              <label for="c_link">Link:</label>
              <input type="text" class="form-control" name="c_link" id="c_link">
            </div>
			
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Update Cultural</button>
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
  var c_event= $(this).data('event');
  $("#c_id").val(c_id);
  $("#c_name").val(c_name);
  $("#c_email").val(c_email);
  $("#c_mobile").val(c_mobile);
  $("#c_address").val(c_address);
  $("#c_link").val(c_link);
  $("#c_event").val(c_event);
  
  
});
  </script>
  