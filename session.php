<?php
if(!isset($_SESSION['username']))
{
   header("Location: index.php");
}else{
session_start();
include('database.php');
include('class.php');
$class = new vignesh();
$user = $app->AdminDetails($_SESSION['username']); // get user details
}
?>