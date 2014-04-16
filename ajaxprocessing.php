

<?php





$name = $_REQUEST['sname'];
$sname = htmlspecialchars($name);
$email = $_REQUEST['semail'];
$semail = htmlspecialchars($email);
$message = $_REQUEST['smessage'];
$smessage = htmlspecialchars($message);
$atPos= strpos($email, '@');
$dotPos = strpos($email, '.', $atPos);
$invalidEmail = ($atPos<1 || $dotPos<1 || ($dotPos - $atPos)<2);

if( $sname == "" || $semail == "" || $smessage == "" || $invalidEmail) {
	//return false;
	echo false;
	exit();

}





$to = "pablocangas@gmail.com";
$subject = "Aplication Form";
$message = $smessage;
$from = $semail;
$headers = "From:" . $from;
mail($to, $subject, $message, $headers);

//echo $to;
//echo $semail;
//echo $sname;
echo $message;

return true;


?>