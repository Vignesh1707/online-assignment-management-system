<?php
// database Connection variables
define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'root'); // Database user. ex. root ( if your on local server)
define('PASSWORD', ''); // user password  (if password is not set for user then keep it empty )
define('DATABASE', 'vignesh'); // Database Database name
 
function DB()
{
    try {
        $db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e)
	{
        return "Error!: " . 
		$e->getMessage();
        die();
    }
}
?>