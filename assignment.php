<?php
include('incl/header1.php');
include('incl/teacher_menu.php');
if(isset($_POST['Submit']))
{	
	$Department = $_POST['Department'];
	$Course = $_POST['Course'];
	$Year = $_POST['Year'];
	$Class = $_POST['Class'];
	$Subject = $_POST['Subject'];
	$Title = $_POST['Title'];
	$Description = $_POST['Description'];
	$Assigndate =  date('Y-m-d H:i:sa');
	$Deadlinedate = $_POST['Deadlinedate'];
	$insert = $class->Form_Insert($Department,$Course,$Year,$Class,$Subject,$Title,$Description,$Assigndate,$Deadlinedate);
	if($insert == true){
		$success_msg = "Student assignment created successfully";
		header("refresh:2;assignment.php");
	}else{
		$error_msg = "Sorry,Student assignment not created ";
	}
}
if(isset($_POST['Update']))
{
	$id = $_POST['a_id'];
	$Department = $_POST['Department'];
	$Course = $_POST['Course'];
	$Year = $_POST['Year'];
	$Class = $_POST['Class'];
	$Subject = $_POST['Subject'];
	$Title = $_POST['Title'];
	$Description = $_POST['Description'];
	$Deadlinedate = $_POST['Deadlinedate'];
	$update = $class->Form_Update($id,$Department,$Course,$Year,$Class,$Subject,$Title,$Description,$Deadlinedate);
	if($update == true){
		$success_msg = "Student assignment updated successfully";
		header("refresh:2;assignment.php");
	}else{
		$error_msg = "Sorry,Student assignment not updated ";
	}	
}
if(isset($_GET['delete_id']))
{ 
    $id = $_GET['delete_id'];
	$delete = $class->form_delete($id);
	if($delete == true){
		$success_msg = "Student assignment deleted successfully";
		header("refresh:2;assignment.php");
	}else{
		$error_msg = "Sorry,Student assignment not deleted";
	}	
}
?>
<body class="hold-transition sidebar-mini">
 <div class="content-header">
      
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Teacher</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">My class</a></li>
          
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
		    <section class="content">  
	<form action="" method="POST" >
	
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

  <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
  
          <div class="card-header">
		  <div class="pull-left">
            <h1>Assignment Form</h1>
			</div>
            <h3 class="card-title">Student Assignment Details</h3>

           
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
             <div class="form-group">
   
                  <label>Select Academic</label>
                  <select class="form-control" name="Department"required>
				     <option selected disabled>Select a Academic</option>
                    <option>Engineering</option>
                    <option>Arts and Science</option>
                    
                   
                  </select>
                
				</div>
                <!-- /.form-group -->
                <div class="form-group">
   
                  <label>Course Type</label>
                  <select class="form-control" name="Course"  required>
				     <option selected disabled>Select a course</option>
                    <option>Undergraduate</option>
                    <option>Postgraduate</option>
                    <option>Integrated</option>
                   
                  </select>
                </div>
				
                <!-- /.form-group -->
                           
                  <div class="form-group">
   
                  <label>Year</label>
                  <select class="form-control" name="Year"  required>
				     <option selected disabled>Select year</option>
                    <option>1st Year</option>
                    <option>2nd Year</option>
                    <option>3rd Year</option>
                    <option>4th Year</option>
				    <option>5th Year</option>
                  </select>
             
				</div>
				 <div class="form-group">
  
                  <label>Class</label>
                  <select class="form-control" name="Class"  required>
				     <option selected disabled>Select a class</option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
					<option>E</option>
                  </select>
                </div>
				
				 <div class="form-group">
                  <label>Subject</label>
                  <select class="form-control" name="Subject"  required>
				     <option selected disabled>Select a subject</option>
                    <option>C Programming</option>
                    <option>Java</option>
                    <option>Maths</option>
                    <option>Design and Analysis of Algorithms</option>
					<option>Fundamentals of Computer science</option>
                  </select>
                </div>
				
				</div>
                <!-- /.form-group -->
				<div class="col-md-6">
              <div class="form-group">
   
    <label for="exampleFormControlInputTitle" >Assignment Title</label>
    <input type="text" class="form-control" name="Title"  id="exampleInputTitle" placeholder="Enter the assignment title" required >
  </div>
        
			  <div class="form-group">
    <label for="exampleInputAssigndate" >Assigning Date</label>
    <input type="timestamp" value="<?php
	date_default_timezone_set('Asia/Kolkata');
echo  date('Y-m-d H:i:s a');
?>"class="form-control"  name="Assigndate" id="exampleInputAssigndate"     disabled>
	
  </div>
    <div class="form-group">
    <label for="exampleInputdeadlinedate" >Deadline Date</label>
    <input type="date"  class="form-control" name="Deadlinedate" id="exampleInputdeadlinedate"  placeholder="Enter the assignment deadline date" required>
  
  </div>
   <div class="form-group">
          <label for="inputDescription"> Assignment Description</label>
         <textarea id="inputDescription" class="form-control" rows="5" name="Description" placeholder="Assignment details" required></textarea>
         </div>
  </div>
  </div>
  </div>
<br>
<center>
 <div class="col-auto">
    <button type="submit" name="Submit" class="btn btn-success float-center ">Create Assignment</button>

     </div>
     </center>
     </form>
     <span><br></span>
     </div>
</div>
</div>

  <div class="container-fluid" >
   
 <div class="row">
 
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Student Assignment Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="details" class="table table-bordered table-hover table-responsive">
			   <thead>
    <tr>      
	  <th scope="col">Department</th>
	  <th scope="col">Course</th>
	  <th scope="col">Year</th>
      <th scope="col">Class</th>
	  <th scope="col">Subject</th>
      <th scope="col">Title</th>
	  <th scope="col">Description </th> 
	  <th scope="col">Assigndate </th>
	  <th scope="col">Deadlinedate </th>	
      <th scope="col">Action</th>	  
    </tr>
  </thead>
	  <?php
		 $query = $class->Form_Read();
		 if($query == true){
			 $i = 1;
			 while($row=$query->fetch(PDO::FETCH_OBJ)){
		 ?>
		 <tr>
			<td><?php echo $row->Department;?></td>
			<td><?php echo $row->Course;?></td>
			<td><?php echo $row->Year;?></td>
			<td><?php echo $row->Class;?></td>
			<td><?php echo $row->Subject;?></td>
			<td><?php echo $row->Title;?></td>
			<td><?php echo $row->Description;?></td>
			<td><?php echo $row->Assigndate;?></td>
			<td><?php echo $row->Deadlinedate;?></td>
			<td>
			<div class="btn-group">
                        <a href="#exampleModal<?php echo $i;?>" class="btn btn-default" data-toggle="modal"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo '?delete_id='.$row->a_id;?>" class="btn btn-default"><i class="fa fa-trash-alt"></i></a>
            </div>
					   <div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Assignment Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
		<form action="" method="POST" >
	
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

   <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Student Assignment Details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
             <div class="col-md-6">
              <div class="form-group">
   
                  <label>Select Department</label>
                  <select class="form-control" name="Department" required>
				     <option selected disabled>Select a Department </option> 
                    <option value="Engineering" <?php  if($row->Department == "Engineering") echo 'selected="selected"'; ?> >Engineering</option>
                    <option value="Computer Application" <?php  if($row->Department == "Computer Application") echo 'selected="selected"'; ?>>Computer Application</option>
                    <option value="Computer Technology" <?php  if($row->Department == "Computer Technology") echo 'selected="selected"'; ?>>Computer Technology</option>
                   
                  </select>
                
				</div>
                <!-- /.form-group -->
                <div class="form-group">
   
                  <label>Course Type</label>
                  <select class="form-control" name="Course"  required>
				     <option selected disabled>Select a course</option>
                    <option value="Undergraduate" <?php  if($row->Course == "Undergraduate") echo 'selected="selected"'; ?>>Undergraduate</option>
                    <option value="Postgraduate" <?php  if($row->Course == "Postgraduate") echo 'selected="selected"'; ?>>Postgraduate</option>
                    <option  value="Integrated" <?php  if($row->Course == "Integrated") echo 'selected="selected"'; ?>>Integrated</option>
                   
                  </select>
                </div>
				
                <!-- /.form-group -->
                           
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
				
				 <div class="form-group">
                  <label>Subject</label>
                  <select class="form-control" name="Subject"  required>
				     <option selected disabled>Select a subject</option>
                    <option value="C Programming" <?php  if($row->Subject == "C Programming") echo 'selected="selected"'; ?>>C Programming</option>
                    <option value="Java" <?php  if($row->Subject == "Java") echo 'selected="selected"'; ?>>Java</option>
                    <option value="Maths" <?php  if($row->Subject == "Maths") echo 'selected="selected"'; ?>>Maths</option>
                    <option value="Design and Analysis of Algorithms" <?php  if($row->Subject == "Design and Analysis of Algorithms") echo 'selected="selected"'; ?>>Design and Analysis of Algorithms</option>
					<option value="Fundamentals of Computer science" <?php  if($row->Subject == "Fundamentals of Computer science") echo 'selected="selected"'; ?>>Fundamentals of Computer science</option>
                  </select>
                </div>
				
				</div>
                <!-- /.form-group -->
				<input type="hidden" name="a_id" value="<?php echo $row->a_id; ?>"/>
				<div class="col-md-6">
              <div class="form-group">
   
    <label for="exampleFormControlInputTitle" >Assignment Title</label>
    <input type="text" class="form-control" name="Title" value="<?php echo $row->Title; ?>" id="exampleInputTitle" placeholder="Enter the assignment title" required >
  </div>
         <div class="form-group">
          <label for="inputDescription"> Assignment Description</label>
         <textarea id="inputDescription" class="form-control" rows="4" name="Description"  placeholder="Assignment details" required> <?php echo $row->Description;?></textarea>
         </div>
			  <div class="form-group">
    <label for="exampleInputAssigndate" >Assigning Date</label>
    <input type="timestamp" value="<?php echo $row->Assigndate;?>" class="form-control"  name="Assigndate" id="exampleInputAssigndate"     disabled>
	
  </div>
    <div class="form-group">
    <label for="exampleInputdeadlinedate" >Deadline Date</label>
    <input type="date"  class="form-control" name="Deadlinedate" value="<?php echo $row->Deadlinedate;?>" id="exampleInputdeadlinedate"  placeholder="Enter the assignment deadline date" required>
  
  </div>
  </div>
  </div>
  </div>
  </div>
<br>
<center>
 <div class="col-auto">
    <button type="submit" name="Update" class="btn btn-success float-center ">Update Assignment</button>

     </div>
     </center>
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

    </section>
  </div>

 <?php
include('incl/footer.php');

?>
