<?php


$action = $_REQUEST['action'];


require('mapdb.php');


switch($action){ //DETERMINES PATH TO FOLLOW


	case 'read':

		//RETURNS A MARKERS ARRAY WITH ALL THE INFO NEEDED
		$jmarkers = json_encode(getMarkers());
		$response = array('mrkrs'=> $jmarkers, 'act'=> 'read');
		$response = json_encode($response);
		echo $response;
		break;

	case 'write': //RETURNS A MARKERS ARRAY WITH ALL THE INFO NEEDED AFTER UPLOADING INPUT TO DB

		insertMarkers();

		$jmarkers = json_encode(getMarkers());
		$response = array('mrkrs' => $jmarkers,	'act' => 'write');
		$response = json_encode($response);
		echo $response;


		break;


}



//CLOSE CONNECTION
mysqli_close($con);




?>

