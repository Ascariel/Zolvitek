<?php
//CONNECT TO DATABASE
global $con; //make $con available in the function scope
$host = "localhost";
$user = "root";
$pass = "palomo86";
$db = "zolvitek";
$con = mysqli_connect($host, $user, $pass, $db);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}





?>