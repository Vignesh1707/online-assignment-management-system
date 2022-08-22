<?php
/**
 * Tutorial: PHP Login Registration system
 *
 * Page : Logout
 */
 
// start session
session_start();
 
// Destroy user session
unset($_SESSION['username']);
foreach($_COOKIE as  $key => $val)
    {
      $username = $key;
	  $password = $val;
	  setcookie($username, $password, time() - (10 * 365 * 24 * 60 * 60), "/");
	}
 
// Redirect to index.php page
header("Location: index.php");
?>