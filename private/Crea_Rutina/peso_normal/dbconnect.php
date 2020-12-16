<?php 
	
	$host='localhost';
	$username='root';
	$pass='';
	$db='proyec_nutricion';

	$conn=mysqli_connect($host,$username,$pass,$db);

	if(!$conn) die("Connection refused").mysqli_connect_error();
 ?>