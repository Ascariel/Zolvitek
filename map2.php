<!DOCTYPE HTML>

<html>

<head>

<title> Develop / Zolvitek  </title>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
<link href="jumbotron-narrow.css" rel="stylesheet">
<script type="text/javascript" src="jquery-1.11.0.js"></script>  <!--JQUERY LIBRARY-->
<script src="js/bootstrap.min.js" type="text/javascript"></script><!--JS LIBRARY-->


<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>

<script>
var map;
var markers = [];

var marker;
var infowindow;
var country = 0;
var check = 0


function initialize()
{
	//MAP PROPERTIES
	var mapProp = {
		center:new google.maps.LatLng(51.508742,-0.120850),
		zoom:1,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};


	//CREATE NEW MAP USING PROPERTIES
	 window.map=new google.maps.Map(document.getElementById("googleMap"), mapProp);

	//CREATE MAPS FROM DATABASE
	$.ajax({
		url : '/map/download_markers.php',
		data : {
			dajax : true,
			asdad : true
			} ,
		success : function(response) {

			//tmp = JSON.stringify(response);

			//eval(JSON.parse(tmp));
			//eval(response);



		},

		error: function (xhr, textStatus, errorThrown) {

		}

	}); //close ajax
	*/
	 //CALLING DATABASE DOWNLOAD


	//SUCCES MESSAGE AFTER SUBMIT
	var okMsg = "<div style=' width: 300px height: 200px '> <p style='color: green'>Thanks for joining us!</p> </div>";
	successMsg = new google.maps.InfoWindow({
	content: okMsg
	});
	initialize.success = function success() {successMsg.open(map, marker);};
	initialize.closeSuccess = function close() {successMsg.close();};
	initialize.closeWindow = function() {infowindow.close();};

	//FORM DISPLAYED ON MARKER CLICK
	var html = "<table>" +
	"<tr><td>Username:</td> <td><input type='text' id='username'/> </td> </tr>" +
	"<tr><td>Password:</td> <td><input type='text' id='password'/></td> </tr>" +
	"<tr><td>First Name:</td> <td><input type='text' id='fName'/> </td> </tr>" +
	"<tr><td>Last Name:</td> <td><input type='text' id='lName'/> </td> </tr>" +
	"<tr><td>Country:</td> <td><input type='text' id='country'/></td> </tr>" +
	"<tr><td>Email:</td> <td><input type='text' id='email'/></td> </tr>" +
	"<tr><td></td><td><input type='button' id='submit' value='Save & Close' onclick='saveData();' /></td></tr>";

	infowindow = new google.maps.InfoWindow({
		content: html
	});




 	//Adds a marker on click
	google.maps.event.addListener(map, "click", function(event) {

		if()
		marker = new google.maps.Marker({
			position: event.latLng,
			map: map
				});
		infowindow.open(map, marker);

		//Manually closing infowindow removes marker
		google.maps.event.addListener(infowindow,'closeclick',function() {
   marker.setMap(null);
  	 	} );

	});


	//including marker loading





//	var latlng = marker.getPosition(); HOW TO GET MARKER POSTION
	//	google.maps.event.addListener(marker, "click", function() {
	//	infowindow.open(map, marker);
	//	});

} //close initialize

google.maps.event.addDomListener(window, 'load', initialize);


<!--JAVASCRIPT AND AJAX -->

//FUNCION QUE GUARDA LAS VARIABLES AL APRETAR SIGN IN O SUBMIT
function saveData() {
	alert('input being tested...');

	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	var fName = document.getElementById('fName').value;
	var lName = document.getElementById('lName').value;
	var country = document.getElementById('country').value;
	var email = document.getElementById('email').value;
	var pos = marker.getPosition();
	var latlng = JSON.stringify(pos);
	var check = (username != "" && password != "" && fName != "" && lName != "" && country != "" && email != "");
	if(!(check)){alert('input not saved');}
	else{
		//alert(JSON.parse(latlng));
		//alert('input saved correctly');

		<!-- AJAX -->


		$.ajax({
			url: "/map/upload_markers.php",
			//dataType: "html",
			data : {
				suser: username,
				spass: password,
				sfName: fName,
				slName: lName,
				semail: email,
				scountry: country,
				slatlng: latlng,
				sajax: true
			},
			success: function(response){

				initialize.closeWindow();
				initialize.success();

				setTimeout(function(){initialize.closeSuccess();}, 3000);
			},
			error: function(xhr, textStatus, errorThrown) {

			}

		}); //Ajax closure


	}//close else

	//CHEQUEA QUE TODOS LOS INPUTS ESTEN LLENOS Y CUMPLAN LOS FORMATOS
	/if(country == 0) {marker.setMap(null); }
//	if(email == 0) {infowindow.close(map, marker);}
}; //close savedata()





</script>


</head>







<body>
<!-- MISSING PHP include("includes/zheader.php")?>-->

<div id="googleMap" style="width:500px;height:380px;"></div>

	<?php include('map/download_markers.php'); ?>
<!-- MISSING TAGS php include("includes/zfooter.php")?> -->
</body>





</html>



