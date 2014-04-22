<?php



//FUNCTION THAT CHECKS DB TOO SEE IF USER IS ALREADY REGISTERED
function checkExistence($usernameA, $emailA){

	global $con; //make $con available in the function scope

	//MAKE MYSQL QUERY 	FOR USERNAME MATCH
	$sql = "SELECT username FROM Zolvitek_Login WHERE username ='$usernameA' ";
	$user_result = mysqli_query($con, $sql);
	$user_row = mysqli_fetch_array($user_result);//SETS VARIABLE WITH USERNAME IF THERES A MATCH
	$userExists = isset($user_row);

	//MAKE MYSQL QUERY 	FOR EMAIL MATCH
	$sql = "SELECT email FROM Zolvitek_Login WHERE email ='$emailA' ";
	$email_result = mysqli_query($con, $sql);
	$email_row = mysqli_fetch_array($email_result);//SETS VARIABLE WITH USERNAME IF THERES A MATCH
	$emailExists = isset($email_row);
	$existence;

	if($userExists){
		$existence[0] = 'usernameExists';
		}
	else{
		$existence[0] = false;
		}

	if($emailExists){
		$existence[1] = 'emailExists';
		}
	else{
		$existence[1] = false;
		}

	return $existence;
};


//INSERTS USER DETAILS INTO DATABASE
function registerUser($username, $password, $fname,$lname, $email, $country){
	global $con; //make $con available in the function scope

	$sql = "INSERT INTO Zolvitek_Login (username, password, fname, lname, email, country) VALUES ('$username', '$password', '$fname', '$lname', '$email', '$country')";
	$insert = mysqli_query($con, $sql);
	if(!$insert){//INSERTS DATA INTO DB AND RETURNS TRUE, ELSE ERROR
		die('There is an error in the INSERT INTO statement: '. mysqli_error($con));
		}
	$_SESSION['email'] = $email; //SETS AN ID TO A SESSION VARIABLE THAT WILL BE CHECKED LATER TO DETECT LOGIN STATE AND PERMISIONS
	$_SESSION['username'] = $username;
	return true;
};


function checkLogin($emailA, $passwordA){

	global $con; //make $con available in the function scope

	$sql = "SELECT email FROM Zolvitek_Login WHERE email ='$emailA' AND password = '$passwordA' ";
	$result = mysqli_query($con, $sql);
	$row_email = mysqli_fetch_array($result);
	$_SESSION['email'] = $row_email;//IF EMAIL AND PASSWORD MATCH FOR SAME USER, IT SAVES EMAIL INTO SESSION TO ALLOW LOGIN CHEKCS LATER
	//print_r($_SESSION['email']);
	return (isset($_SESSION['email']));
}

?>