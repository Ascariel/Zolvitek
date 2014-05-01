<?php
/*$smessage = '1';
$semail = 'pablocangas@gmail.com';

$to = "pablocangas@gmail.com";
$subject = "Cron Job Test";
$message = $smessage;
$from = $semail;
$headers = "From:" . $semail;

mail($to, $subject, $message, $headers);
*/

$counter = 0;
$dateformat = 'Y-m-d G:i:s';
$date_time = date($dateformat);
//CONNECT TO DB
global $con;
$con = mysqli_connect('localhost', 'root', 'palomo86', 'zolvitek');

if(mysqli_connect_errno()){
	echo 'failed to conect to db: '. mysqli_connect_error();
}

//INSERT COUNTER DATA INTO DB
$sql= "INSERT INTO Zolvitek_Crons (cronNumber, date_time) VALUES ('$counter', '$date_time') ";
if(!mysqli_query($con, $sql)){
	printf('Error: '. mysqli_error($con));
}

//RETRIEVE COUNTER FROM DB

$rsql = "SELECT id FROM Zolvitek_Crons ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $rsql);
if(!mysqli_query($con, $rsql)){
printf('Error: '. mysqli_error($con));
}

$row = mysqli_fetch_array($result);
$dateformat = 'd F Y G i:A';

echo  "\n Hello $World {$Array['key']}" ;
echo '\n';
echo  "\r\n";
echo '/r/n';
echo ' > asdadadasdsadadasda '.'Testing Cron Job ' . 'Log N: ' .$row['id']. ' Date: ' . date($dateformat).'\n';
echo ' \> '.'Testing Cron Job ' . 'Log N: ' .$row['id']. ' Date: ' . date($dateformat).'\r\n';
?>