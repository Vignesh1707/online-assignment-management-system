<?php
include('incl/header1.php');
include('incl/student_menu.php');
if(isset($_POST['submit']))
{
	
	$file_upload = $_FILES["file_upload"]["name"];
	
		$insert = $class->Files($file_upload);
        if($insert == false){
		$file_upload_msg = "Your work not submitted";	
		}else{
		move_uploaded_file($_FILES["file_upload"]["tmp_name"],"Files/"  .$_FILES["file_upload"]["name"]);	
		$file_upload_msg = "Your work submitted successfully";
		header("referesh:2; view_assignment.php");
		}
	
}
	
	
?>



 <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Text Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Text Editors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Bootstrap WYSIHTML5
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
			  
                <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             <form action="" method="POST" enctype="multipart/form-data">
	 
			  </div>
              <p class="text-sm mb-0">
                Editor <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">Documentation and license
                information.</a>
              </p>
			  <br>
			   <form action="" method="POST" enctype="multipart/form-data">
			   <?php
	  if(isset($file_upload_msg)){
	  ?>
	  <div class="alert alert-default"><strong>Message: </strong><?php echo $file_upload_msg;?></div>
	  <?php
	  }
	  ?>
			    <div class="col-sm-12">
				<p>Choose the file to submit your work</p>
          <input type="file" name="file_upload" class="form-label" placeholder="Upload file" required>
              </div>
			    <div class="text-right">
                <button type="submit" name="submit" class="btn btn-success float-center">Submit Assignment</button>
</form>
               </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->
 <?php
include('incl/footer.php');

?>
