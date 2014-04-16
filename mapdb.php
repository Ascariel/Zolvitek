<?php

//CONNECT TO DATABASE
require('map/connect_db.php');





//FUNCTION THAT GETS INFO FROM DB AND SETS IT INTO AN ARRAY
function getMarkers(){
	//make $con available in the function scope
	global $con;
	//MAKE MYSQL QUERY
	$sql = "SELECT * FROM Zolvitek_Users";
	$result = mysqli_query($con, $sql);
	$markers = array();
	$i = 1;

	while($row = mysqli_fetch_array($result)){

		$markers[$i] = $row;
		$i++;

	}
	$markers[0] = $i-1;
	return $markers;
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

