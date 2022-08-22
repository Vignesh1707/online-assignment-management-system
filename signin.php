<?php
include('database.php');
include('class.php');
$class = new vignesh();
if(isset($_POST['submit']))
{
	$terms = $_POST['terms'];
	if(isset($terms)){
	$profile_name = $_POST['profile_name'];
	$username = trim($_POST['username']);
	$email = $_POST['email'];
	$user_type = trim($_POST['user_type']);
	$password = $_POST['password'];
	$retype_password = $_POST['retype_password'];
	$user_profile = $_FILES["user_profile"]["name"];
	if($password == $retype_password){
		$insert = $class->Signin($profile_name,$username,$user_type,$password,$email,$user_profile);
        if($insert == false){
		$signin_msg = "Account Not Created";	
		}else{
		move_uploaded_file($_FILES["user_profile"]["tmp_name"],"Profile_Photos/"  .$_FILES["user_profile"]["name"]);	
		$signin_msg = "Account Created";
		header("referesh:2; sigin.php");
		}
	}else{
		$signin_msg = "Password Doesn't Match";
	}
	}else{
		$signin_msg = "Read all terms & conditions";
	}
}
?>
<?php
include('incl/header.php');

?>
<body class="hold-transition login-page">

 <div class="col-sm-5">
<div class="container-fluid "
<div class="login-box">
     
  <br>
<br><br><br>
<br><br><br><br><br>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
	<br>

<center>	<h3>Smart Assessment</h3></center>

      <form action="" method="POST" enctype="multipart/form-data">
	  <?php
	  if(isset($signin_msg)){
	  ?>
	  <div class="alert alert-default"><strong>Message: </strong><?php echo $signin_msg;?></div>
	  <?php
	  }
	  ?>
 	<div class="col-sm-12">
    <label for="exampleInputname" class="form-label">Profile name</label>
    <input type="text" class="form-control" name="profile_name" id="exampleInputname" maxlength="15" placeholder="Profile name" required>
    
  </div>
		 	<div class="col-sm-12">
    <label for="exampleInputusername" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputusername" maxlength="15" placeholder="Username" required>
    
  </div>
  <div class="col-sm-12">
    <label for="exampleInputemail" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" id="email"  maxlength="100" placeholder="example@gmail.com" required>
  

  </div>

  
  
		 <div class="col-sm-12">
  <label for="exampleDataList" class="form-label">Usertype</label>
<input class="form-control" list="datalistOptions" name="user_type" id="exampleDataList" placeholder="Select user..." required>
<datalist id="datalistOptions">
  <option value="Teacher">
   <option value="Student">
<option value="Admin">
</datalist>
</div>
		
 	<div class="col-sm-12">
    <label for="exampleInputpassword" class="form-label"> Password</label>
    <input type="password" class="form-control" name="password" id="password"   required>
    
  </div>
  
  
		 	<div class="col-sm-12">
    <label for="exampleInputretype_password" class="form-label">Retype password</label>
    <input type="password" class="form-control" name="retype_password" id="exampleInputpassword" maxlength="15" placeholder="Retype password" required>
    
  </div>
  <br>
		
  	
  		<div class="col-sm-12">
          <input type="file" name="user_profile" class="form-label" placeholder="Upload file" required>
</div>
  <br>
  
       <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
		 <button type="submit" name="submit" class="btn btn-block btn-info">
           Sign Up
        </button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    

      <p class="mb-1">
        <a href="forgot_password.php"> Forgot my password</a>
      </p>
	  
	   <p class="mb-1">
        Registered user?<a href="index.php"> Log In</a>
      </p>
    </div>
    </div>
	</div>
    <!-- /.login-card-body -->
  </div>
</div>



</body>


