


















<?php

$mysql_connection = mysql_connect("localhost", "root", "palomo86");

//check for errors

if(!$mysql_connection){
	die("Could not connect to Database: " . mysql_error());
}

//Select database

mysql_select_db("contacts", $mysql_connection);

//Query database
$res = mysql_query("select name, phone_number from people ");
while($row = mysql_fetch_array($res)) {


	echo 'Name: ';
	echo $row['name'];


	echo '<br />';

	echo ' Phone Number: ';
	echo $row['phone_number'];

	echo '<br />';
}

print_r($res);


row [name, phone_number]



?>


