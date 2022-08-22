<?php
ob_start();
include('incl/header1.php');
include('incl/student_menu.php');
if(isset($_POST['Update']))
{
		
	$file_upload = $_FILES["file_upload"]["name"];
	
	$update = $class->Files_Update(	$file_upload);
	if($update == false){
	$error_msg = "File upload not completed";	
		}
		else{
		move_uploaded_file($_FILES["file_upload"]["tmp_name"],"Files/"  .$_FILES["file_upload"]["name"]);	
		$success_msg = "file upload completed";
		header("refresh:2; submit_assignment.php");
		}
}

?>

 <div class="content-header">
 <div class="wrapper">
<div class="container-well">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">My Assignments</a></li>
          
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
		 
		  
		    <section class="content">
			
       <div class="container-well" >
  
 <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
			  <div class="pull-right">
            <h1>Assignment Submit Table</h1>
			</div>
              <h3 class="card-title">Submit Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table  class="table table-striped table-bordered table-hover table-responsive">
			   <thead>
    <tr>      
	  <th scope="col">Academic</th>
	  <th scope="col">Course</th>
	  <th scope="col">Year</th>
      <th scope="col">Class</th>
	  <th scope="col">Subject</th>  
	   <th scope="col">Title</th>
	  <th scope="col">Description </th> 
	  <th scope="col">Assigndate </th>
	  <th scope="col">Deadlinedate </th>
	  <th scope="col">Files </th>	 
	  <th scope="col">Details </th>	 
    </tr>
  </thead>
   <?php
		 $query = $class->Submit_Assignment();
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
			<td><?php echo $row->file_upload;?></td>
			
			<td>
			<div>
                      <a href="#exampleModal<?php echo $i;?>" class="btn btn-default" data-toggle="modal">Details</a>
                        
            </div>
					   <div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit File Submission Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
		   <form action="" method="POST" id="form" onsubmit="return formOK;" enctype="multipart/form-data">

	
   <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Student Submission Details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
             <div class="col-md-12">
              <div class="form-group">
			 
                               
                            <span> Remark:<?php echo $row->Comment;?> </span>
							</div>
							  <div class="form-group">
                               
                            <span> Mark:<?php echo $row->Mark;?> </span>
							</div>
   
                  <div class="form-group">
   
    			    <div class="col-sm-12">
				<p>Choose the file to submit your work</p>
			 <input type="file" name="file_upload" onchange="validatePDF(this)" accept="application/pdf" class="form-control" value="<?php echo $row->file_upload;?>" placeholder="Upload file" required multiple>
          
			 </div>
			 
                
				</div>
				 
                <!-- /.form-group -->
                
  </div>
  </div>
  </div>
<br>
<center>
 

    <button type="submit_file" name="Update"  accept="application/pdf" value="submit" id="submit" class="btn btn-success float-center">Upload Assignment</button>

     </div>
     </center>
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

</section>
</div>
</div>
</div>
</div>
 <?php
include('incl/footer.php');
?>
