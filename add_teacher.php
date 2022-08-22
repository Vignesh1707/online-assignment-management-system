<?php
    ob_start();
    include('incl/header1.php');
    include('incl/admin_menu.php');
    if(isset($_POST['Submit']))
    {	
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
        $insert = $class->Teacher_Insert($Name,$Dob,$Joiningdate,$Gender,$Qualification,$Email,$Phone_no,$Academic,$Department,$Subject);
    	if($insert == true){
    		$success_msg = "Teacher details added successfully";
    		header("refresh:2;add_teacher.php");
    	}else{
    		$error_msg = "Sorry,Teacher details not added";
    	}
    }
    
?>
<body class="hold-transition sidebar-mini">
    <div class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Teacher</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">My class</a></li>
            </ol>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
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
                        <h1>Teacher Details </h1>
                    
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" >Teacher name</label>
                                <input type="text" class="form-control" name="Name"  id="name" placeholder="Enter the teacher name" required >
                            </div>
                            <div class="form-group">
                                <label for="date" >Date of Birth</label>
                                <input type="date"  class="form-control" name="Dob" id="date"  placeholder="D.O.B" required>
                            </div>
                            <div class="form-group">
                                <label for="date" >Joining Date</label>
                                <input type="date"  class="form-control" name="Joiningdate" id="date"  placeholder="Enter the assignment joining date" required>
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
                                <label for="qualification" >Qualification</label>
                                <input type="text" class="form-control" name="Qualification"  id="qualification" placeholder="Enter the qualification" required >
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.form-group -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label"> Email</label>
                                <input type="text" class="form-control" name="Email" id="Email"  maxlength="100" placeholder="example@gmail.com" required>
                            </div>
                            <div class="form-group">
                                <label for="tel" class="form-label">Phone no</label>
                                <input type="tel" class="form-control" name="Phone_no" id="phone_no" pattern="[0-9]{10}" maxlength="10" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label> Academic</label>
                                <select class="form-control" name="Academic" id="Academic" required>
                                    <option selected disabled>Select a academic</option>
                                    <option>Teacher of Engineering</option>
                                    <option>Teacher of Arts and Science</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <!--<div class=".select2">-->
                                    <label> Department Name</label>
                                    <select class="form-control select2" multiple="true" name="Department[]" id="Department" style="width: 100%;" required>
                                        <option value="Department of Chemical Engineering ">Department of Chemical Engineering </option>
                                        <option value="Department of Automobile Engineering">Department of Automobile Engineering</option>
                                        <option value="Department of Civil Engineering">Department of Civil Engineering</option>
                                        <option value="Department of Computer Science - UG">Department of Computer Science - UG</option>
                                        <option value="Department of Computer Science - PG">Department of Computer Science - PG</option>
                                    </select>
                              <!--  </div>-->
                            </div>
                            <div class="form-group">
                               <!--  <div class=".select2">-->
                                    <label>Subject</label>
                                    <select class="form-control select2" multiple="true" name="Subject[]" style="width: 100%;" placeholder="Handling subject">
                                        <option value="Tamil">Tamil</option>
                                        <option value="English">English</option>
                                        <option value="Maths"> Maths</option>
                                        <option value="Chemistry">Chemistry</option>
                                        <option value="Physics">Physics</option>
                                    </select>
                               <!--  </div>-->
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
					<center>
					 
                        <button type="submit" name="Submit" class="btn btn-success float-center ">Submit</button>
                    
					      </center>
                </div>
  
				  </div>
				  </div>
				  </div>
        </form>
      
    </section>
  </div>
    <?php
        include('incl/footer.php');
        
        ?>