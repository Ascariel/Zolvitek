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

function initialize(){
	//MAP PROPERTIES
	var mapProp = {
		center:new google.maps.LatLng(15.508742, 7.120850),
		zoom:1,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};


	//CREATE NEW MAP USING PROPERTIES
	 window.map=new google.maps.Map(document.getElementById("googleMap"), mapProp);

	//RESET VARIABLES
	var username= '' ;
	var password = '';
	var fName = '';
	var lName = '';
	var country = '';
	var email = '';
	var pos = '';
	var latlng = '';
	//SUCCES MESSAGE AFTER SUBMIT
	var okMsg = "<div style='width: 300px height: 200px '> <p style='color: green'>Thanks for joining us!</p> </div>";
	successMsg = new google.maps.InfoWindow({
	content: okMsg
	});
	initialize.success = function success() {successMsg.open(map, marker);};
	initialize.closeSuccess = function close() {successMsg.close();};
	initialize.closeWindow = function() {infowindow.close();};



	//FORM DISPLAYED ON MARKER CLICK
	var html = $('#pablo_form').html();


	//CREATE INFOWINDOW
	infowindow = new google.maps.InfoWindow({
		content: html
	});




 	//Adds a marker on click
	google.maps.event.addListener(map, "click", function(event) {
		if(typeof marker !== 'undefined'){
		marker.setMap(null);
		}
			marker = new google.maps.Marker({
			position: event.latLng,
			map: map
				});
		//CREATE INFOWINDOW ONCLICK
		infowindow.open(map, marker);

		//Manually closing infowindow removes marker
		google.maps.event.addListener(infowindow,'closeclick',function() {
   marker.setMap(null);
  	 	} );

	});//close map click event

//ajax call to read markers info(read from db)

google.maps.event.addDomListener(map, 'tilesloaded', function(){ ajaxCall('read')} );
} //close initialize


//START MAP LOADING
google.maps.event.addDomListener(window, 'load', initialize );


//FUNCTION TO GET MARKERS DISPLAYED

function drawMarkers(info){


	var row = info;
	var lngth = row[0];

	console.log(row[0]);
	for(i=1; i<=lngth; i++){
		var markpos = row[i][3];
		var markers = [];
		console.log(markpos);
		var markpos = JSON.parse(markpos);
		var lat = markpos['A'];
		//var lat = lat.substring(0, 3);
		var lng = markpos['k'];
	//	var lng = lng.substring(0, 5);

		//var mposition = ("new google.maps.latLng" + markpos);
		console.log(markpos);
	//	console.log(lat.trimTo(4));
		console.log(lng);
		console.log(typeof lat);
		console.log(typeof lng);
		markers[i] = new google.maps.Marker({
			position: new google.maps.LatLng(lng, lat),
			map: map
		});

	}

};

<!--JAVASCRIPT AND AJAX -->

//FUNCION QUE GUARDA LAS VARIABLES AL APRETAR SIGN IN O SUBMIT
function ajaxCall(qry) {
	console.log('input being tested...');
	var query = qry;

	switch(qry){

		case 'write':

			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;
			var fName = document.getElementById('fName').value;
			var lName = document.getElementById('lName').value;
			var country = document.getElementById('country').value;
			var email = document.getElementById('email').value;
			var pos = marker.getPosition();
			var latlng = JSON.stringify(pos);
			//var latlng = pos.toString();
			var writeData = [username, password, fName, lName, country, email, latlng];
			var jsonWData = JSON.stringify(writeData);
			var correctyChecked = (username != "" && password != "" && fName != "" && lName != "" && country != "" && email != "");
				if(!correctyChecked){
				console.log('input not saved');
				marker.setMap(null);
				var correctyChecked = false;
					}
			console.log(latlng);
			break;

		case 'read':

			//set other variables I might need for a read request...
			var correctyChecked = 1; //some checking method...
			if(!correctyChecked){
				var correctyChecked = false;
					}
			break;


	} //close switch


		<!-- AJAX FUNCTION -->

		if(correctyChecked){
			console.log('ajax started....')

			$.ajax({
				url: "/processmap.php",
				dataType: "JSON",
				data : {
					suser: username,
					spass: password,
					sfName: fName,
					slName: lName,
					semail: email,
					scountry: country,
					slatlng: latlng,
					jsonDat: jsonWData,
					action: query,
					sajax: true
				},
				success: function(response){
					console.log('ajax successful...');

					//CREATE CALL TO FUNCTION TO DRAW MARKERS WITH DB INFO.

					console.log(response);
					var responseD = response;
					var act = responseD['act'];
					//var markers = response;
					var markers = responseD['mrkrs'];
					var markers = JSON.parse(markers);
					console.log(act);
					console.log(markers);
					if(act =='write'){
						initialize.success();
						initialize.closeWindow();

						drawMarkers(markers);
					    setTimeout(function(){initialize.closeSuccess();}, 2200);
						//setTimeout(function(){initialize();}, 1700);
					}

					//DECODE ANSWER INTO AN ARRAY WITH THE VARIABLES I NEED TO CREATE A MARKER
					drawMarkers(markers);
					//console.log("");
					//eval(response);
					//JSON.parse(response);
					//return response;

				},
				error: function(xhr, textStatus, errorThrown) {

				}

			}); //Ajax closure
		}//close if correctyChecked...

		else{
			console.log('Failed ' + qry + ' check');
		}




}; //close ajaxCall()





</script>



</head>







<body>
<?php require("includes/zheader.php")?>
<script id="pablo_form" type="pablo-template">
<table style="height:180px;">
	<tbody>
		<tr><td>Username:</td> <td><input type="text" id="username"> </td>
		</tr><tr><td>Password:</td> <td><input type="text" id="password"></td>
		</tr><tr><td>First Name:</td> <td><input type="text" id="fName"> </td>
		</tr><tr><td>Last Name:</td> <td><input type="text" id="lName"> </td>
		</tr><tr><td>Country:</td> <td><input type="text" id="country"></td>
		</tr><tr><td>Email:</td> <td><input type="text" id="email"></td>
		</tr><tr><td></td><td><input type="button" onclick="ajaxCall('write');" value="Save &amp; Close" id="submit"></td></tr>
	</tbody>
</table>

</script>
<div id="googleMap" style="margin-left:13%; width:520px;height:460px;"></div>


<?php include("includes/zfooter.php")?>
</body>





</html>



