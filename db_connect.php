<?php
	try
	{
		$servername ="mysql-srecreig.alwaysdata.net";
		$username = "srecreig";
		$password = "SREPARIS";
		$conn = new PDO("mysql:host=$servername;dbname=srecreig_base", $username, $password);
		//$conn = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
	    echo "Connection failed: " . $e->getMessage();
	}
?>