<?php
session_start();

//CLOSES SESSION
if($_REQUEST['action'] == 'log_off'){
	session_destroy();
	//echo $_REQUEST['action'];
	return false;
}
return false;

?>