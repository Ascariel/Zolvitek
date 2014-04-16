<?php

//CONNECT TO DATABASE
require('/connect_db.php');

$username = $_REQUEST('zusername');
$password = $_REQUEST('zpassword');
$fname = $_REQUEST('zfname');
$lname = $_REQUEST('zlname');
$email = $_REQUEST('zemail');
$country = $_REQUEST('zcountry');

require('map/connect_db.php');

$userExists = checkexistence();
if($userExists){
	return true;
}
else {

return false;
}

?>