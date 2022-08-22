<?php
ob_start();
include('incl/header1.php');
include('incl/admin_menu.php');
if(isset($_POST['Update']))
{
	$id = $_POST['a_id'];
	$Academic = $_POST['Academic'];
	$Department = $_POST['Department'];
	$Year = $_POST['Year'];
	$Class = $_POST['Class'];
	$update = $class->Department_Update($id,$Academic,$Department,$Year,$Class);
	if($update == true){
		$success_msg = "Student assignment updated successfully";
		header("refresh:2;view_department.php");
	}else{
		$error_msg = "Sorry,Student assignment not updated ";
	}	
}
if(isset($_GET['delete_id']))
{ 
    $id = $_GET['delete_id'];
	$delete = $class->Department_delete($id);
	if($delete == true){
		$success_msg = "Student assignment deleted successfully";
		header("refresh:2;view_department.php");
	}else{
		$error_msg = "Sorry,Student assignment not deleted";
	}	
}
?>	

 <div class="wrapper">
 <div class="row container">
 <div class="col-sm-8">
 <?php
		 if(isset($success_msg)){
		 ?>
		 <div class="alert alert-success"><strong>Response: <?php echo $success_msg;?></strong></div>
		 <?php
		 }
		 ?>
		 <?php
		 if(isset($error_msg)){
		 ?>
		 <div class="alert alert-danger"><strong>Response: <?php echo $error_msg;?></strong></div>
		 <?php
		 }
		 ?>
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Department Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
			<div class="table-responsive">
              <table id="details" class="table table-bordered table-hover table-responsive">
			   <thead>
    <tr>      
	 
	  <th scope="col">Academic</th>
	  <th scope="col">Department</th>		  
	  <th scope="col">Year</th>		  
	  <th scope="col">Class</th>		  
      <th scope="col">Action</th>	  
   	  
    </tr>
  </thead>
	  <?php
		 $query = $class->Department_Read();
		 if($query == true){
			  $i = 1;
			 while($row=$query->fetch(PDO::FETCH_OBJ)){
		 ?>
		 <tr>
			
			<td><?php echo $row->Academic;?></td>
			<td><?php echo $row->Department;?></td>
			<td><?php echo $row->Year;?></td>
			<td><?php echo $row->Class;?></td>
		
			
			<td>
			<div class="btn-group">
                        <a href="#exampleModal<?php echo $i;?>" class="btn btn-default" data-toggle="modal"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo '?delete_id='.$row->id;?>" class="btn btn-default"><i class="fa fa-trash-alt"></i></a>
            </div>
					   <div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Department Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
		<form action="" method="POST" >
	
  <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
  
          <div class="card-header">
		  <div class="pull-left">
            <h1>Department Details </h1>
			</div>
    
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
             <div class="form-group">
   
                  <label> Academic</label>
                  <select class="form-control" name="Academic" id="Academic" required>
				     <option selected disabled>Select a academic</option>
                    <option value="Engineering" <?php  if($row->Academic == "Engineering") echo 'selected="selected"'; ?>>Engineering</option>
                    <option value="Arts and Science" <?php  if($row->Academic == "Arts and Science") echo 'selected="selected"'; ?>>Arts and Science</option>
                    
                   
                  </select>
                
				</div>
				
				 <div class="form-group">
   
                  <label> Department Name</label>
                  <select class="form-control" name="Department" id="Department" required>
				     <option selected disabled>Select a Department</option>
                    <option value="Department of Chemical Engineering" <?php  if($row->Department == "Department of Chemical Engineering") echo 'selected="selected"'; ?>>Department of Chemical Engineering </option>
                    <option value="Department of Automobile Engineering" <?php  if($row->Department == "Department of Automobile Engineering") echo 'selected="selected"'; ?>>Department of Automobile Engineering</option>
                    <option value="Department of Civil Engineering" <?php  if($row->Department == "Department of Civil Engineering") echo 'selected="selected"'; ?>>Department of Civil Engineering</option>  
                    <option value="Department of Computer Science - UG" <?php  if($row->Department == "Department of Computer Science - UG") echo 'selected="selected"'; ?>>Department of Computer Science - UG</option>  
                    <option value="Department of Computer Science - PG" <?php  if($row->Department == "Department of Computer Science - PG") echo 'selected="selected"'; ?>>Department of Computer Science - PG</option>  
                    
                   
                  </select>
                
				</div>
			  
		
  	  
  		
                <!-- /.form-group -->
        				</div>
						<input type="hidden" name="a_id" value="<?php echo $row->id; ?>"/>
                <!-- /.form-group -->
				<div class="col-md-6">
        
	
			<div class="col-sm-12">
		
			
					
				
				<div class="form-group">
   
                  <label>Year</label>
                  <select class="form-control" name="Year"  required>
				     <option selected disabled>Select year</option>
                    <option  value="1st Year" <?php  if($row->Year == "1st Year") echo 'selected="selected"'; ?>>1st Year</option>
                    <option value="2nd Year" <?php  if($row->Year == "2nd Year") echo 'selected="selected"'; ?>>2nd Year</option>
                    <option value="3rd Year" <?php  if($row->Year == "3rd Year") echo 'selected="selected"'; ?> >3rd Year</option>
                    <option value="4th Year" <?php  if($row->Year == "4th Year") echo 'selected="selected"'; ?>>4th Year</option>
				    <option value="5th Year" <?php  if($row->Year == "5th Year") echo 'selected="selected"'; ?>>5th Year</option>
                  </select>
             
				</div>
 <div class="form-group">
  
                  <label>Class</label>
                  <select class="form-control" name="Class"  required>
				     <option selected disabled>Select a class</option>
                    <option value="A" <?php  if($row->Class == "A") echo 'selected="selected"'; ?>>A</option>
                    <option value="B" <?php  if($row->Class == "B") echo 'selected="selected"'; ?>>B</option>
                    <option value="C" <?php  if($row->Class == "C") echo 'selected="selected"'; ?>>C</option>
                    <option value="D" <?php  if($row->Class == "D") echo 'selected="selected"'; ?>>D</option>
					<option value="E" <?php  if($row->Class == "E") echo 'selected="selected"'; ?>>E</option>
                  </select>
                </div>
 
				</div>
                <!-- /.form-group -->
			
  </div>

  </div>

   <center>
 <div class="col-auto">
    <button type="submit" name="Update" class="btn btn-success float-center ">Submit</button>
</div>
     </center>
	 </div>
		</div>
		</div>
		</div>
     </form>
		
		
		</div>
		</div>
		</div>
		</div>
		 </div>
			</td>
		
		 </tr>
        <?php
		 $i++;
			 }
		 }else{
			 echo '<tr>No Records</tr>';
		 }
		 ?>
		 </table>    
    </div>
	 </div>
	 </div>
	 </div>
	 </div>
	 </div>
	 
	 
<?php
include('incl/footer.php');
?>