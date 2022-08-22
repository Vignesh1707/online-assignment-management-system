<?php
ob_start();
include('incl/header1.php');
include('incl/admin_menu.php');
if(isset($_POST['Update']))
{
	$id = $_POST['a_id'];
	$Name = $_POST['Name'];
	$Register_no = $_POST['Register_no'];
	$Dob = $_POST['Dob'];
	$Gender = $_POST['Gender'];
	$Email = $_POST['Email'];
	$Phone_no = $_POST['Phone_no'];
	$Academic = $_POST['Academic'];
	$Department = $_POST['Department'];
	$Year = $_POST['Year'];
	$Class = $_POST['Class'];
	$update = $class->Student_Update($id,$Name,$Register_no,$Dob,$Gender,$Email,$Phone_no,$Academic,$Department,$Year,$Class);
	if($update == true){
		$success_msg = "Student details updated successfully";
		header("refresh:2;view_student.php");
	}else{
		$error_msg = "Sorry,Student details not updated ";
	}	
}if(isset($_GET['delete_id']))
{ 
    $id = $_GET['delete_id'];
	$delete = $class->Student_delete($id);
	if($delete == true){
		$success_msg = "Student details deleted successfully";
		header("refresh:2;view_student.php");
	}else{
		$error_msg = "Sorry,Student details not deleted";
	}	
}
?>	
	<div class="container-fluid" >
   
 <div class="row">
  <div class="col-12">
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
              <h3 class="card-title">Student Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="details" class="table table-bordered table-hover table-responsive ">
			   <thead>
    <tr>      
	  <th scope="col">Student Name</th>
	  <th scope="col">Register no</th>
	  <th scope="col">Date of Birth</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
	  <th scope="col">Phone_no</th> 
	  <th scope="col">Academic</th>
	  <th scope="col">Department</th>	
	  <th scope="col">Year</th>	 
	  <th scope="col">Class</th>	 
      <th scope="col">Action</th>	  
    </tr>
  </thead>
	  <?php
		 $query = $class->Student_Read();
		 if($query == true){
			  $i = 1;
			 while($row=$query->fetch(PDO::FETCH_OBJ)){
		 ?>
		 <tr>
			<td><?php echo $row->Name;?></td>
			<td><?php echo $row->Register_no;?></td>
			<td><?php echo $row->Dob;?></td>			
			<td><?php echo $row->Gender;?></td>
			<td><?php echo $row->Email;?></td>
			<td><?php echo $row->Phone_no;?></td>
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
        <h5 class="modal-title" id="exampleModalLabel"> Edit Student Details</h5>
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
            <h3 class="card-title">Student Registration Form</h3>

           
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                   <div class="form-group">
   
    <label for="name" >Student name</label>
    <input type="text" class="form-control" name="Name" value="<?php echo $row->Name;?>" id="name" placeholder="Enter the student name" required >
  </div>
  <div class="form-group">
    <label for="register_no" class="form-label">Register no</label>
    <input type="text" class="form-control" name="Register_no" value="<?php echo $row->Register_no;?>" id="register_no"  maxlength="10" placeholder="roll_no" required>
    
  </div>
   <div class="form-group">
    <label for="date" >Date of Birth</label>
    <input type="date"  class="form-control" name="Dob"  value="<?php echo $row->Dob;?>" id="date"  placeholder="D.O.B" required>
  
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
    <label for="email" class="form-label"> Email</label>
    <input type="text" class="form-control" name="Email"   value="<?php echo $row->Email;?>" id="mail" pattern=".+@gmail\.com" maxlength="100" placeholder="example@gmail.com" required>
    
  </div>
  	  
  		
  
                <!-- /.form-group -->
        				</div>
						<input type="hidden" name="a_id" value="<?php echo $row->id; ?>"/>
                <!-- /.form-group -->
				<div class="col-md-6">
        
	
			
		
			<div class="form-group">
    <label for="tel" class="form-label">Phone no</label>
    <input type="tel" class="form-control" name="Phone_no"  value="<?php echo $row->Phone_no;?>" id="phone_no" pattern="[0-9]{10}" maxlength="10" placeholder="" required>
    
  </div>
			
					 <div class="form-group">
   
                  <label> Academic</label>
                  <select class="form-control" name="Academic" id="Academic" required>
				     <option selected disabled>Select a academic</option>
                    <option value="Student of Engineering" <?php  if($row->Academic == "Student of Engineering") echo 'selected="selected"'; ?>>Student of Engineering</option>
                    <option value="Student of Arts and Science" <?php  if($row->Academic == "Student of Arts and Science") echo 'selected="selected"'; ?>>Student of Arts and Science</option>
                    
                   
                  </select>
                
				</div>
				
				  <div class="form-group">
   
                  <label> Department Name</label>
                  <select class="form-control" name="Department" id="Department"required>
				     <option selected disabled>Select a Department</option>
                    <option value="Department of Chemical Engineering" <?php  if($row->Department == "Department of Chemical Engineering") echo 'selected="selected"'; ?>>Department of Chemical Engineering </option>
                    <option value="Department of Automobile Engineering" <?php  if($row->Department == "Department of Automobile Engineering") echo 'selected="selected"'; ?>>Department of Automobile Engineering</option>
                    <option value="Department of Civil Engineering" <?php  if($row->Department == "Department of Civil Engineering") echo 'selected="selected"'; ?>>Department of Civil Engineering</option>  
                    <option value="Department of Computer Science - UG" <?php  if($row->Department == "Department of Computer Science - UG") echo 'selected="selected"'; ?>>Department of Computer Science - UG</option>  
                    <option value="Department of Computer Science - PG" <?php  if($row->Department == "Department of Computer Science - PG") echo 'selected="selected"'; ?>>Department of Computer Science - PG</option>  
                    
                   
                  </select>
                
				</div>
				
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
<br>

 <center>
 <div class="col-auto">
    <button type="submit" name="Update" class="btn btn-success float-center ">Update</button>

     </div>
     </center>
     
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

<?php
include('incl/footer.php');
?>