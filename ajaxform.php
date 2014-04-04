
<!DOCTYPE html>
<html>
<head>

	<title>Ajax Form</title>



<script type="text/javascript" src="jquery-1.11.0.js"></script>


</head>
<body>



<form method="post" action="ajaxprocessing.php">
<fieldset>
  <legend>Sign In</legend>

Name <input type="text" name="name" id="urname" ></input>
<div class="error" id="name_error" style="display:none; color: grey; font-size:12px; font-style: italic;" >Warning, please fill in your name.</div>

<div></div><br>

Email <input type="text" name="email" id="uremail"></input>
<div class="error" id="email_error" style="display: none; color:grey; font-size:12px; font-style: italic;" >Warning, please fill in your email address.</div>
<br><br>
    <input type="submit" id="button" value="submit"></input>
<br><br>
    <div id="ajax" style="color: grey; font-size:14px; font-style: italic;"></div>
</fieldset>

</form>



<script>
$(document).ready(function(){
	$('#button').click(function(event){
		event.preventDefault();

	$('.error').css('display', 'none');

			//define variables and error msges
		var name = $("#urname").val();
			if(name == ""){
			$("#name_error").css({"display": "inline", "color": "grey", "font-size":"12px", "font-style":"italic"});
			$("#urname").focus();

				};

			//define variables and error msges
		var email = $("#uremail").val()
		if(email == ""){
			$("#email_error").css({"display":"inline","color": "grey", "font-size":"12px", "font-style":"italic"});
			$("#uremail").focus();
			if(name == ""){
			$("#urname").focus();
			return false;
			}
		};

		$.ajax({
			url: "ajaxprocessing.php",
			dataType: "html",
			data : {
				sname: name,
				semail: email,
				sajax: true
				},
			success: function(response){
			$("#ajax").html("Your message has been sent, thanks for aplying.")
				alert(response);
			},
			error: function(xhr, textStatus, errorThrown) {

			}

		});



	})
});







</script>







</body>
</html>