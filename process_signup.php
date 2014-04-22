<?php
session_start();//DEFINES SESSION TO START SAVING DATA
//CONNECT TO DATABASE


require('connect_db.php');
$zusername = $_REQUEST['zusername'];
$username = addslashes(strip_tags($zusername));;
$zpassword = md5($_REQUEST['zpassword']);//MD5 PROTECTED PASSWORD
$password = addslashes(strip_tags($zpassword));;
$zfname = $_REQUEST['zfname'];
$fname = addslashes(strip_tags($zfname));;
$zlname = $_REQUEST['zlname'];
$lname = addslashes(strip_tags($zlname));;
$zemail = $_REQUEST['zemail'];
$email = addslashes(strip_tags($zemail));;
$zcountry = $_REQUEST['zcountry'];
$country = addslashes(strip_tags($zcountry));;
$action = $_REQUEST['action'];
require('zuser_db.php');
//echo($zpassword);
//echo '<br>';
//echo($password);

if($action == 'login'){//CREATES PATH SPECIFIC TO LOGIN CALLS

	$loginAproved = checkLogin($email, $password);//CHECK IF EMAIL AND PASS MATCH IN ONE SAME ROW IN DB, TO VALIDATE LOGIN

	if($loginAproved){
		$loginResult = 'Login Aproved';
		$loginResult = json_encode($loginResult);
		$_SESSION['username'] = $username;
		echo $loginResult;
		}
	else{
		$loginResult = 'Login Failed';
		$loginResult = json_encode($loginResult);
		echo $loginResult;
	}
}

else{


	//CHECKS DATA BASE FOR EXISTENT USERNAME AND EMAIL
	 $existence = checkExistence($username, $email);

	if(!$existence[0] && !$existence[1]){//IF THERES NO MATCH, PROCEED TO REGISTER, ELSE...

		registerUser($username, $password, $fname,$lname, $email, $country);
		$success = json_encode('User Registered');
		echo $success;

	}

	else {//SENDS BACK INFO TELLING WHICH FIELD ALREADY EXISTS AND NEED TO BE CHANGED

		$existenceJSON = JSON_encode($existence);
		echo $existenceJSON;
	}

}

?>