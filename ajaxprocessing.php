<?php

$sname = $_REQUEST['sname'];
$semail = $_REQUEST['semail'];
$smessage = $_REQUEST['smessage'];

$to = "pablocangas@gmail.com";
$subject = "Aplication Form";
$message = $smessage;
$from = $semail;
$headers = "From:" . $from;
mail($to, $subject, $message, $headers);

echo $to;
echo $semail;
echo $sname;
echo $message;

return false;


?>