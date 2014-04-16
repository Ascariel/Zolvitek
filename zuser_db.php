<?php



	//CONNECT TO DATABASE
	require('connect_db.php');





//FUNCTION THAT CHECKS DB TOO SEE IF USER IS ALREADY REGISTERED
function checkExistence(){

	global $con; //make $con available in the function scope

	//MAKE MYSQL QUERY
	$sql = "SELECT username, email FROM Zolvitek_Login WHERE username='$username' OR email='$email' ";
	$result = mysqli_query($con, $sql);
	//$i = 1;

	$row = mysqli_fetch_array($result);
	$userExists = $row;

	if(!$userExists != ""){
		return true;
	}
	//	$username = $row['username'];
	//	$email= $row['email'];
	//	$i++;



	return false;
};//close function



//FUNCTION THAT INSERTS MARKERS INTO DB
function insertMarkers(){
	//make $con available in the function scope
	global $con;

	//GET VARIABLES FROM AJAX
	$user = $_REQUEST['suser'];
	$pass = $_REQUEST['spass'];
	$fName = $_REQUEST['sfName'];
	$lName = $_REQUEST['slName'];
	$latlng = $_REQUEST['slatlng'];
	$country = $_REQUEST['scountry'];
	$email = $_REQUEST['semail'];
	$jsonData = $_REQUEST['jsonDat'];
	$ajax = $_REQUEST['sajax'];

	//UPLOAD VARIABLES TO DABASE

	$sql = "INSERT INTO Zolvitek_Users (username, password, latlng, firstName, lastName, country, email) VALUES ('$user', '$pass', '$latlng', '$fName', '$lName', '$country', '$email')";
	//CALLING THE QUERY
	if (!mysqli_query($con, $sql))
	{
		die('Error: asdad' . mysqli_error($con));
	}
};






?>