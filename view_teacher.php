<?php
ob_start();
include('incl/header1.php');
include('incl/admin_menu.php');
if(isset($_POST['Update']))
{
	$t_id = $_POST['t_id'];
	$Name = $_POST['Name'];
	$Dob = $_POST['Dob'];
	$Joiningdate = $_POST['Joiningdate'];
	$Gender = $_POST['Gender'];
	$Qualification = $_POST['Qualification'];
	$Email = $_POST['Email'];
	$Phone_no = $_POST['Phone_no'];
	$Academic = $_POST['Academic'];
	$Department = implode(",",$_POST['Department']);
	$Subject = implode(",",$_POST['Subject']);
	$update = $class->Teacher_Update($t_id,$Name,$Dob,$Joiningdate,$Gender,$Qualification,$Email,$Phone_no,$Academic,$Department,$Subject);
	if($update == true){
		$success_msg = "Teacher details updated successfully";
		header("refresh:2;view_teacher.php");
	}else{
		$error_msg = "Sorry,Teacher details not updated ";
	}	
}if(isset($_GET['delete_id']))
{ 
    $id = $_GET['delete_id'];
	$delete = $class->Teacher_delete($id);
	if($delete == true){
		$success_msg = "Teacher details deleted successfully";
		header("refresh:2;view_teacher.php");
	}else{
		$error_msg = "Sorry,Teacher details not deleted";
	}	
}
?>	
	<div class="container-fluid" >
   
 <div class="row">
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Teacher Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="details" class="table table-striped table-bordered table-hover table-responsive">
			   <thead>
    <tr>      
	  <th scope="col">Teacher Name</th>
	  <th scope="col">Date of Birth</th>
	  <th scope="col">Joining Date</th>
      <th scope="col">Gender</th>
	  <th scope="col">Qualification</th>
      <th scope="col">Email</th>
	  <th scope="col">Phone_no</th> 
	  <th scope="col">Academic</th>
	  <th scope="col">Department</th>	
      <th scope="col">Subject</th>	  
      <th scope="col">Action</th>	  
    </tr>
  </thead>
	  <?php
		 $query = $class->Teacher_Read();
		 if($query == true){
			  $i = 1;
			 while($row=$query->fetch(PDO::FETCH_OBJ)){
		 ?>
		 <tr>
			<td><?php echo $row->Name;?></td>
			<td><?php echo $row->Dob;?></td>
			<td><?php echo $row->Joiningdate;?></td>
			<td><?php echo $row->Gender;?></td>
			<td><?php echo $row->Qualification;?></td>
			<td><?php echo $row->Email;?></td>
			<td><?php echo $row->Phone_no;?></td>
			<td><?php echo $row->Academic;?></td>
			<td><?php echo $row->Department;?></td>
			<td><?php echo $row->Subject;?></td>
			<td>
			<div class="btn-group">
                        <a href="#exampleModal<?php echo $i;?>" class="btn btn-default" data-toggle="modal"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo '?delete_id='.$row->t_id;?>" class="btn btn-default"><i class="fa fa-trash-alt"></i></a>
            </div>
					   <div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Teacher Details</h5>
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
		  <center>
            <h1> Form</h1>
			</center><br>
            <h3 class="card-title">Teacher Registration Form</h3>

           
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                   <div class="form-group">
   
    <label for="name" >Teacher name</label>
    <input type="text" class="form-control" name="Name" value="<?php echo $row->Name;?>" id="name" placeholder="Enter the teacher name" required >
  </div>
   <div class="form-group">
    <label for="date" >Date of Birth</label>
    <input type="date"  class="form-control" name="Dob"  value="<?php echo $row->Dob;?>" id="date"  placeholder="D.O.B" required>
  
  </div>
  	 <div class="form-group">
    <label for="date" >Joining Date</label>
    <input type="date"  class="form-control" name="Joiningdate" value="<?php echo $row->Joiningdate; ?>" id="date"  placeholder="Enter the assignment joining date" required>
  
  </div>
  <div class="form-group">
   
                  <label>Gender</label>
                  <select class="form-control" name="Gender"  required>
				     <option selected disabled>Select gender</option>
                    <option value="Male" <?php  if($row->Gender == "Male") echo 'selected="selected"'; ?>>Male</option>
			         <option value="Female" <?php  if($row->Gender  == "Female") echo 'selected="selected"'; ?>>Female</option>
                    <option  value="Other" <?php  if($row->Gender  == "Other") echo 'selected="selected"'; ?>>Other</option>
                   
                  </select>
             
				</div>
			
			
  	   <div class="form-group">
   
    <label for="qualification" >Qualification</label>
    <input type="text" class="form-control" name="Qualification"  value="<?php echo $row->Qualification;?>"  id="qualification" placeholder="Enter the qualification" required >
  </div>
  		
  
                <!-- /.form-group -->
        				</div>
						<input type="hidden" name="t_id" value="<?php echo $row->t_id; ?>"/>
                <!-- /.form-group -->
				<div class="col-md-6">
        
	
			
			<div class="form-group">
    <label for="email" class="form-label"> Email</label>
    <input type="text" class="form-control" name="Email"   value="<?php echo $row->Email;?>" id="mail" pattern=".+@gmail\.com" maxlength="100" placeholder="example@gmail.com" required>
    
  </div>
			<div class="form-group">
    <label for="tel" class="form-label">Phone no</label>
    <input type="tel" class="form-control" name="Phone_no"  value="<?php echo $row->Phone_no;?>" id="phone_no" pattern="[0-9]{10}" maxlength="10" placeholder="" required>
    
  </div>
			
					 <div class="form-group">
   
                  <label> Academic</label>
                  <select class="form-control" name="Academic" id="Academic" required>
				     <option selected disabled>Select a academic</option>
                    <option value="Teacher of Engineering" <?php  if($row->Academic == "Teacher of Engineering") echo 'selected="selected"'; ?>>Teacher of Engineering</option>
                    <option value="Teacher of Arts and Science" <?php  if($row->Academic == "Teacher of Arts and Science") echo 'selected="selected"'; ?>>Teacher of Arts and Science</option>
                    
                   
                  </select>
                
				</div>
				
				  <div class="form-group">
        <div class=".select2">  
                  <label> Department Name</label>
                  <select class="form-control select2" multiple="true" name="Department[]" id="Department" required>

                    <option value="Department of Chemical Engineering" <?php  if($row->Department == "Department of Chemical Engineering") echo 'selected="selected"'; ?>>Department of Chemical Engineering </option>
                    <option value="Department of Automobile Engineering" <?php  if($row->Department == "Department of Automobile Engineering") echo 'selected="selected"'; ?>>Department of Automobile Engineering</option>
                    <option value="Department of Civil Engineering" <?php  if($row->Department == "Department of Civil Engineering") echo 'selected="selected"'; ?>>Department of Civil Engineering</option>  
                    <option value="Department of Computer Science - UG" <?php  if($row->Department == "Department of Computer Science - UG") echo 'selected="selected"'; ?>>Department of Computer Science - UG</option>  
                    <option value="Department of Computer Science - PG" <?php  if($row->Department == "Department of Computer Science - PG") echo 'selected="selected"'; ?>>Department of Computer Science - PG</option>  
                    
                   
                  </select>
                
				</div>
				</div>
		<div class="form-group">
        <div class=".select2">                    
                
 
  <label>Subject</label>


   <select class="form-control select2" multiple="true" name="Subject[]" placeholder="Handling subject">
   <option value="Tamil"<?php  if($row->Subject == "Tamil") echo 'selected="selected"'; ?> >Tamil</option>
   <option value="English"<?php  if($row->Subject == "English") echo 'selected="selected"'; ?>>English</option>
   <option value="Maths"<?php  if($row->Subject == "Maths") echo 'selected="selected"'; ?>>Maths</option>
   <option value="Chemistry"<?php  if($row->Subject == "Chemistry") echo 'selected="selected"'; ?>>Chemistry</option>
   <option value="Physics"<?php  if($row->Subject == "Physics") echo 'selected="selected"'; ?>>Physics</option>
   </select>

   </div>
   </div>

				</div>
                <!-- /.form-group -->
			
  </div>
  </div>
<br>
<center>
 <div class="col-auto">
    <button type="submit" name="Update" class="btn btn-success float-center ">Update</button>

     </div>
     </center>
     </form>
		</div>
		</div>
		</div>
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

<?php
include('incl/footer.php');
?>