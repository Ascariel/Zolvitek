<!DOCTYPE HTML>

<html>

<head>
<meta charset="utf-8">
<title> Sign Up / Zolvitek  </title>

<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"> <!--BOOTSRAP BASIC CSS-->
<link href="jumbotron-narrow.css" rel="stylesheet">
<script type="text/javascript" src="jquery-1.11.0.js"></script>  <!--JQUERY LIBRARY-->
<script src="js/bootstrap.min.js" type="text/javascript"></script><!--JS LIBRARY-->


<script>

//TRIGGERED ON SUBMIT
$(document).ready(function(){
	$('#submit_button').click(function(event){
		event.preventDefault();


		$('.form-control').css('border', '1.7px solid #B7BBBD'); //RESETS FORM BORDERS TO DEFAULT

		setVariables();


		//console.log(username);









//SETS VARIABLES AND CHECKS ALL INPUT IS CORRECTLY FILLED
function setVariables(){

		var username = $('#username').val();
		var password = $('#password').val();
		var rpassword = $('#rpassword').val();
		var fname = $('#fname ').val();
		var lname = $('#lname ').val();
		var email = $('#email').val();
		var country = $('#country').val();

		var correctlyChecked = (username != "" && password != "" && fname !="" && lname !="" && email !="" && country !="" && password===rpassword);

		inputCheck(); //CHECKS INPUT


		if(correctlyChecked){//EXECUTES AJAX
			console.log('Succesful ajax started');


			$.ajax({

				url: "/process_signup.php",
				dataType: "JSON",
				data: {
					 zusername : username,
					 zpassword : password,
					 zfname : fname,
					 zlname : lname,
					 zemail : email,
					 zcountry : country,
					 action: 'signup'
					},
				success: function(response){
					console.log('ajax response succesful');
					var res = response;
					console.log(res)
					console.log(res[0]);
					console.log(res[1]);

					if(res === 'User Registered'){alert('user was registered succesfully');}

					if(res[0] === 'usernameExists'){alert('user exists');}
					if(res[1] === 'emailExists'){alert('email exists');}



					if(!response){alert('username or email already in use');}
					console.log('user registered');
					window.location = 'protected_area.php'

					},
				error: function(xhr, textStatus, errorThrown) {


					}





			}); //AJAX CLOSURE



			}

		else{
			console.log('Failed inputCheck');
			return false;
			}

		function inputCheck(){

			if(username == ""){ $('#username').css('border', '#FF4D4D solid 1px');}
			if(password == ""){ $('#password').css('border', '#FF4D4D solid 1px');}
			if(rpassword == ""){ $('#rpassword').css('border', '#FF4D4D solid 1px');}
			if(password != rpassword){
				$('#password').css('border', '#FF4D4D solid 1px');
				$('#rpassword').css('border', '#FF4D4D solid 1px');
				alert('Passwords do not match, try again carefully ')
				}
			if(fname == ""){ $('#fname').css('border', '#FF4D4D solid 1px');}
			if(lname == ""){ $('#lname').css('border', '#FF4D4D solid 1px');}
			if(email == ""){ $('#email').css('border', '#FF4D4D solid 1px');}
			if(country == ""){ $('#country').css('border', '#FF4D4D solid 1px');}


		}; //close input check

	};//close set variables
 })//close event

});//close document.ready
</script>


</head>




<div class="col-sm-4"></div>


<body>
<?php include("includes/zheader.php")?>

<div class="container" style="width:600px;">

<form class="form-horizontal" method="post" action="process_signup.php">
  <div class="form-group">
    <label for="username" class="col-sm-3 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="username" placeholder="Username">
    </div>
    <div class="col-sm-4"></div>
  </div>

  <div class="form-group">
    <label for="password" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
    <div class="col-sm-4"></div>
  </div>

  <div class="form-group">
    <label for="rpassword" class="col-sm-3 control-label">Repeat Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="rpassword" placeholder="Repeat Password">
    </div>
    <div class="col-sm-4"></div>
  </div>

  <div class="form-group">
    <label for="fname" class="col-sm-3 control-label">First Name</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="fname" placeholder="First Name">
    </div>
    <div class="col-sm-4"></div>
    </div>

    <div class="form-group">
    <label for="lname" class="col-sm-3 control-label">Last Name</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="lname" placeholder="Last Name">
    </div>
    <div class="col-sm-4"></div>
    </div>

  <div class="form-group">
    <label for="email" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-5">
      <input type="email" class="form-control" id="email" placeholder="Email">
    </div>
    <div class="col-sm-4"></div>
  </div>

  <div class="form-group">
    <label for="country" class="col-sm-3 control-label">Country</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="country" placeholder="Country of origin">
    </div>
    <div class="col-sm-4"></div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" id="submit_button" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>

</div> <!-- CLOSES BODY SUBCOINTAINER -->

<?php include("includes/zfooter.php")?>
</body>





</html>



