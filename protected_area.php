<?php
session_start();
?>

<!DOCTYPE HTML>

<html>

<head>

<title> Sign Up / Zolvitek  </title>

<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
<link href="jumbotron-narrow.css" rel="stylesheet">

<script type="text/javascript" src="jquery-1.11.0.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>



<script>
var access = "<? if(!isset($_SESSION['email'])){echo 'redirect';} ?>";
if(access == "redirect"){
	$(document).ready(function(){
		$('#msg').html('You do not have permision rights to view this content, please register with us for full access');
		setTimeout(function(){$('#msg').html('You are now being redirected to sign up page...');}, 2000);
		setTimeout(function(){window.location = "signup.php";}, 4000);
	});


}
else{
	window.onload = function(){
	$('#msg').html('Welcome!! You now have full access to all of our content!');
	};

}


</script>


</head>




<div class="col-sm-4"></div>


<body>
<?php include("includes/zheader.php")?>

<div class="container" style="">
<h1>
<?php
	if(!isset($_SESSION['email'])){
	//	echo "You do not have permision rights to view this content, please register with us for full access";
	//	echo '<br><br><br><b><i> Please register or login to gain full access to our resources.</i></b></br>';
	//	echo 'setTimeOut(function(){window.location = "signup.php";}, 3000);';
	}

?>
</h1>

<h1 id="msg"></h1>
</div> <!-- CLOSES BODY SUBCOINTAINER -->

<?php include("includes/zfooter.php")?>
</body>





</html>


