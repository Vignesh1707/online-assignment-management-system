<?php
ob_start();
include('incl/header1.php');
include('incl/teacher_menu.php');

?>	

 <div class="wrapper">
 <div class="row container">
 <div class="col-sm-8">

        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Class Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
			<div class="table-responsive">
              <table id="details" class="table table-bordered table-hover table-responsive">
			   <thead>
    <tr>      
	 
	  <th scope="col">Name</th>
	  <th scope="col">Academic</th>
	  <th scope="col">Department</th>		  
	  <th scope="col">Year</th>		  
	  <th scope="col">Class</th>		  
     	  
   	  
    </tr>
  </thead>
	  <?php
		 $query = $class->Class_Teacher_Read();
		 if($query == true){
			  $i = 1;
			 while($row=$query->fetch(PDO::FETCH_OBJ)){
		 ?>
		 <tr>
			
			<td><?php echo $row->Name;?></td>
			<td><?php echo $row->Academic;?></td>
			<td><?php echo $row->Department;?></td>
			<td><?php echo $row->Year;?></td>
			<td><?php echo $row->Class;?></td>
		
			
		
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