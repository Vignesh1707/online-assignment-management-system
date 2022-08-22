<?php
include('database.php');
include('class.php');
$class = new vignesh();
if(isset($_POST['login']))
{
	$username = trim($_POST['username']);
	$password = $_POST['password'];
	$login = $class->Login($username, $password);
	if($login == true){
		
	}else{
		$login_msg = "User not found";
	}	
}elseif(isset($_COOKIE)){
	
    //var_dump($_COOKIE);
    foreach($_COOKIE as  $key => $val)
    {
      $username = $key;
	  $password = $val;
	  $login = $class->Login($username, $password);
	  if($login > 0)
        {
		  $_SESSION['username'] = $user_id;
        }
        else
        {
            $login_msg = 'Invalid login details';
        }
    }
}
?>
<?php
include('incl/header.php');

?>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
   <b>SMART Assessment</b>
    
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to connect classroom</p>
    
	
     <form action="" method="POST">
	 <?php
	  if(isset($login_msg)){
	  ?>
	  <div class="alert alert-danger"><strong>Message: </strong><?php echo $login_msg;?></div>
	  <?php
	  }
	  ?>
<div class="col-sm-12">
    <label for="exampleInputemail" class="form-label">Username (OR) Email</label>
    <input type="text" class="form-control" name="username" id="txtEmail" onkeyup="ValidateEmail()" placeholder="name" required>
     
  

	 </div>
 <div class="col-sm-12">
    <label for="exampleInputpassword" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword"  placeholder="Password" required>
  </div>
  <br>
  
  
      
	    <div class="row">
          <!-- /.col -->
          <div class="col-12">
		 <button type="submit" name="login" class="btn btn-block btn-primary">
           Log In
        </button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    

      <p class="mb-1">
        <a href="forgot_password.php"> Forgot my password</a>
      </p>
	  <p class="mb-1">
        If You Have No Account?<a href="signin.php"> Sign In</a>
      </p>
    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<script type="text/javascript">
    function ValidateEmail() {
        var email = document.getElementById("txtEmail").value;
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!expr.test(email)) {
            lblError.innerHTML = "Invalid email or username.";
        }
    }
</script>