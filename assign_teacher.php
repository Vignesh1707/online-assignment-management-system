<?php
ob_start();
include('incl/header1.php');
include('incl/admin_menu.php');
if(isset($_POST['Submit']))
{	
    $Name = $_POST['Name'];
    $Academic = implode(",",$_POST['Academic']);
    $Department = implode(",",$_POST['Department']);
    $Year = implode(",",$_POST['Year']);
    $Class = implode(",",$_POST['Class']);
	$insert = $class->Class_Insert($Name,$Academic,$Department,$Year,$Class);
	if($insert == true){
		$success_msg = "Class details added successfully";
		header("refresh:2;assign_teacher.php");
	}else{
		$error_msg = "Sorry,Class details not added";
	}
}
?>
<body class="hold-transition sidebar-mini">
 <div class="content-header">
            <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Assign</h1>
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
            <h1>Assign Teacher </h1>
			</div>
    
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
			   <div class="form-group">
                                <label for="name" >Teacher name</label>
                                <select class="form-control" name="Name"  id="name" placeholder="Enter the teacher name">
  <option selected disabled>Select teacher</option>								 
								 <?php
		 $query = $class->Teacher_Name_Read();
		 if($query == true){

			 while($row=$query->fetch(PDO::FETCH_OBJ)){
		 ?>
		 
		 <option><?php echo $row->Name;?></option>
							
  <?php
  }
  }	
?>
								</select>
                            </div>
              <div class="form-group">
   
                  <label> Academic</label>
                  <select class="form-control select2" multiple="true" name="Academic[]" id="Academic" style="width: 100%;"required>
				    <option>Teacher of Engineering</option>
                    <option>Teacher of Arts and Science</option>
                    
                   
                  </select>
                
				</div>
				
				 <div class="form-group">
                             
                                    <label> Department Name</label>
                                    <select class="form-control select2" multiple="true" name="Department[]" id="Department" style="width: 100%;" required>
                                        <option>Department of Chemical Engineering </option>
                                        <option>Department of Automobile Engineering</option>
                                        <option>Department of Civil Engineering</option>
                                        <option>Department of Computer Science - UG</option>
                                        <option>Department of Computer Science - PG</option>
                                    </select>
                            
                            </div>
  			   
			
			          
 
		
  	  
  		
                <!-- /.form-group -->
        				</div>
                <!-- /.form-group -->
				<div class="col-md-6">
        
	
			<div class="col-sm-12">
		
			
					
				
				<div class="form-group">
   
                  <label>Year</label>
                  <select class="form-control select2" multiple="true" name="Year[]"  style="width: 100%;" required>
				   
                    <option>1st Year</option>
                    <option>2nd Year</option>
                    <option>3rd Year</option>
                    <option>4th Year</option>
				    <option>5th Year</option>
                  </select>
             
				</div>
	 <div class="form-group">
  
                  <label>Class</label>
                  <select class="form-control select2" multiple="true" name="Class[]" style="width: 100%;" required>
				  
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
 <div class="col-auto">
    <button type="submit" name="Submit" class="btn btn-success float-center ">Submit</button>
</div>
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
