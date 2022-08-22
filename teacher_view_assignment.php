<?php
include('incl/header1.php');
include('incl/teacher_menu.php');
 if(isset($_POST['Submit']))
  {	
        $Comment = $_POST['Comment'];
        $Mark = $_POST['Mark'];
        $insert = $class->Teacher_Remark($Comment,$Mark);
    	if($insert == true){
    		$success_msg = "Remark  successfully";
    		header("refresh:2;teacher_view_assignment.php");
    	}else{
    		$error_msg = "Sorry,Remark not added";
    	}
    }
	  

?>
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

 <div class="content-header">
 <div class="wrapper">
<div class="container-well">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Teacher</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">View Assignments</a></li>
          
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
		 
		  
		    <section class="content">
			
       <div class="container-well" >
   
 <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
			  <div class="pull-left">
            <h1>Student Assignment Submission Table</h1>
			</div>
              <h3 class="card-title">Student Assignment Submission Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table  class="table table-bordered table-hover table-responsive" id="view">
			   <thead>
    <tr>     
      <th scope="col">Name</th>	
	  <th scope="col">Department</th>
	  <th scope="col">Course</th>
	  <th scope="col">Year</th>
      <th scope="col">Class</th>
	  <th scope="col">Subject</th>  
	   <th scope="col">Title</th>
	  <th scope="col">Description </th> 
	  <th scope="col">Assigndate </th>
	  <th scope="col">Deadlinedate </th>
	  <th scope="col">Assignment Details </th>	 
	  <th scope="col">View Files </th>	 
	  
	  <th scope="col">Remarks</th>	
	 	
	 
	  
 
    </tr>
  </thead>
   <?php
		 $query = $class->Teacher_View_Assignment();
		 if($query == true){
			 $i = 1;
			 while($row=$query->fetch(PDO::FETCH_OBJ)){
		 ?>
  <tr>
            <td><?php echo $row->username;?></td>
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
				<div class="btn-group">
			 <a  href="Files/<?php echo $row->file_upload;?>"class="btn btn-primary" target="_blank">View</a>

			 <a  href="Files/<?php echo $row->file_upload;?>"download class="btn btn-default"><i class="fas fa-download"></i></a>
	</div>
	</td>
				<td>
			<div class="btn-group">
                        <a href="#exampleModal<?php echo $i;?>" class="btn btn-default" data-toggle="modal"><i class="fas fa-edit"></i></a>
                        
            </div>
					   <div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Mark Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
		 <form action="" method="POST" >
      
        <div class="form-group">
		
		
		
		<label for="inputDescription">Comments</label>
		
            <textarea class="form-control"  type="text" name="Comment"  id="Comment" rows="2" placeholder="Add a Comment"> </textarea>
      
		</div>
		  <div class="form-group">
   
    <label for="exampleFormControlInputMark" >Mark</label>
    <input type="text" class="form-control"  name="Mark"  id="exampleInputMark" placeholder="enter the mark" required >
  </div>
		
		  <center>
        <div>
            <button type="Submit"  name="Submit" class="btn1" id="submitButton" value="Remark" />Remark</button>
            
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
</div>
</div>
</div>
 <?php
include('incl/footer.php');
?>
