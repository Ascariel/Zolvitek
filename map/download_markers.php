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

while($row = mysqli_fetch_array($result)){

	$usernames[$i] = $row['username'];

	$country[$i] = $row['country'];



	?>


	<script>
	alert("working");

var marker = [];
marker[<?php echo $i ?>] = new google.maps.Marker({
position: ,
map: map,
usernames: <?php echo "'$usernames[$i]'" ?> ,
country: <?php echo "'$country[$i]'" ?>

});


</script>



	<?php
	$i = $i + 1;
}; //close while


print_r($usernames);

print_r($country);


mysqli_close($con);
?>
	<script>
	alert("working");
var marker = [];

	</script>