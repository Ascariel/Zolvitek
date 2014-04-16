<?php

//CONNECT TO DATABASE

$zhost = "localhost";
$zuser = "root";
$zpass = "palomo86";
$zdb = "zolvitek";
$con = mysqli_connect($zhost, $zuser, $zpass, $zdb);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



//SERVER SIDE CHECK/HACKING CHECK/XSS

//GET VARIABLES FROM AJAX

$user = $_REQUEST['suser'];
$pass = $_REQUEST['spass'];
$fName = $_REQUEST['sfName'];
$lName = $_REQUEST['slName'];
$latlng = $_REQUEST['slatlng'];
//$lng = $_REQUEST[""];
$country = $_REQUEST['scountry'];
$email = $_REQUEST['semail'];
$ajax = $_REQUEST['sajax'];

if (isset($ajax)) {



//UPLOAD VARIABLES TO DABASE

$sql = "INSERT INTO Zolvitek_Users (username, password, latlng, firstName, lastName, country, email) VALUES ('$user', '$pass', '$latlng', '$fName', '$lName', '$country', '$email')";
//CALLING THE QUERY
if (!mysqli_query($con,$sql))
{
	die('Error: ' . mysqli_error($con));
}

}//close if isset ajax
//CLOSE CONNECTION
mysqli_close($con);

?>