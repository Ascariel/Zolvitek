<?php



	//CONNECT TO DATABASE

$zhost = "localhost";
$zuser = "root";
$zpass = "palomo86";
$zdb = "zolvitek";
$con = mysqli_connect($zhost, $zuser, $zpass, $zdb);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$sql = "SELECT * FROM Zolvitek_Users";
$result = mysqli_query($con, $sql);


$usernames = array();
//$geopos = array();
$country = array();
$i = 0;
$markers = array();
while($row = mysqli_fetch_array($result)){

	$usernames[$i] = $row['username'];
	//$pos =$row['latlng'];

	$country[$i] = $row['country'];


//<div>  <!--TRYING TO INSERT JAVASCRIPT AS A DIV-->
	?>
	<script>
	alert("working");


	marker[<?php echo $i ?>] = new google.maps.Marker({ <!--CHECK MARKER MISTAKE, ARRAY EMPTY DIFFERENT VARIABLES -->
			position: <!--' geopos[<?php //echo $i ?>] '--> (69.1, 50),
			map: map,
			usernames: <?php echo "'$usernames[$i]'" ?> ,
			country: <?php echo "'$country[$i]'" ?>

		});



</script>

	<?php
	$i = $i + 1;
};
//</div>
//print_r($usernames);

//print_r($country);

//print_r(markers);
mysqli_close($con);
?>