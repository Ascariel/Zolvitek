

<!DOCTYPE html>

<html>

<head>

</head>




<body>


<form method="post"; action="blog_f.php">

Enter your Name:
<input type="text" name="name"> <br>
No studies
<input type="radio"; name="radio1"; value="No studies";>
College
<input type="radio"; name="radio1"; value="College level studies";>
University
<input type="radio"; name="radio1"; value="University level studies"> <br>
<input type="submit"; value="Submit">




<?php


// CONNECT TO THE DATABASE
$DB_NAME = 'zolvitek';
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'palomo86';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}


//DEFINE TITLE AND BODY INTO VARIABLES, FROM DE SUBMIT FORM
$title= $_POST["Title"];
$body= $_POST["Body"];
//INSERT TITLE AND BODY INTO TABLE
$query1 = "INSERT INTO Blog_Posts (Title, Body) VALUES ('$title', '$body')";
$mysqli->query($query1);




// A QUICK QUERY ON A FAKE UsSER TABLE
$result = mysqli_query($mysqli,"SELECT * FROM Blog_Posts");

while($row = mysqli_fetch_array($result))
{




	?>

		<div class="blog-post">
            <h2 class="blog-post-title"> <?php 	echo $row['Title'] ?> </h2><br>
            <p class="blog-post-meta"><?php echo $row['Body']; ?> </p>

			<hr>
            <p style="font-size:16px; color: grey; margin-top:-15px;  "><i> <?php  //$input=stripslashes($row['Date']);
	//	 $time = strtotime($input);
	//	echo date("F  j,  Y  \a\\t G:i:s a", $time);

	//	?></i></p>


          </div><!-- /.blog-post -->

	<?php
}

// CLOSE CONNECTION
mysqli_close($mysqli);

?>

</form>

</body>

</html>


