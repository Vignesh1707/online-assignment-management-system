<?php
ob_start();
include('incl/header1.php');
include('incl/admin_menu.php');
if(isset($_POST['Submit']))
{	
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
    $insert = $class->Student_Insert($Name,$Register_no,$Dob,$Gender,$Email,$Phone_no,$Academic,$Department,$Year,$Class);
	if($insert == true){
		$success_msg = "Student details added successfully";
		header("refresh:2;add_student.php");
	}else{
		$error_msg = "Sorry,Student details not added";
	}
}

?>
<body class="hold-transition sidebar-mini">
 <div class="content-header">
      
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student</h1>
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
  
          <div class="card-header center">
		
            <h1>Student Details </h1>
			</div>
    
          
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                   <div class="form-group">
   
    <label for="name" >Student name</label>
    <input type="text" class="form-control" name="Name"  id="name" placeholder="Enter the student name" required >
  </div>
  	<div class="form-group">
    <label for="register_no" class="form-label">Register no</label>
    <input type="text" class="form-control" name="Register_no" id="register_no"  maxlength="10" placeholder="roll_no" required>
    
  </div>
  		 <div class="form-group">
    <label for="date" >Date of Birth</label>
    <input type="date"  class="form-control" name="Dob" id="date"  placeholder="D.O.B" required>
  
  </div>
  			   <div class="form-group">
   
                  <label>Gender</label>
                  <select class="form-control" name="Gender"  required>
				     <option selected disabled>Select gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                   
                  </select>
             
				</div>
			
			  
		
  	  
  		<div class="form-group">
    <label for="email" class="form-label"> Email</label>
    <input type="text" class="form-control" name="Email" id="mail" maxlength="100" placeholder="example@gmail.com" required>
    
  </div>
  
                <!-- /.form-group -->
        				</div>
                <!-- /.form-group -->
				<div class="col-md-6">
        
	
			<div class="col-sm-12">
			<div class="form-group">
    <label for="tel" class="form-label">Phone no</label>
    <input type="tel" class="form-control" name="Phone_no" id="phone_no" pattern="[0-9]{10}" maxlength="10" placeholder="phone_no" required>
    
  </div>
			
					 <div class="form-group">
   
                  <label> Academic</label>
                  <select class="form-control" name="Academic" id="Academic" required>
				     <option selected disabled>Select a academic</option>
                    <option>Student of Engineering</option>
                    <option>Student of Arts and Science</option>
                    
                   
                  </select>
                
				</div>
				
				  <div class="form-group">
   
                  <label> Department Name</label>
                  <select class="form-control" name="Department" id="Department"required>
				     <option selected disabled>Select a Department</option>
                    <option>Department of Chemical Engineering </option>
                    <option>Department of Automobile Engineering</option>
                    <option>Department of Civil Engineering</option>  
                    <option>Department of Computer Science - UG</option>  
                    <option>Department of Computer Science - PG</option>  
                    
                   
                  </select>
                
				</div>
				
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
 
				</div>
                <!-- /.form-group -->
			
  </div>

  </div>

  
 <center>
    <button type="submit" name="Submit" class="btn btn-success float-center ">Submit</button>
</center>
     
     </form>
    
     </div>
</div>
</div>
    </section>
  </div>

 <?php
include('incl/footer.php');

?>
