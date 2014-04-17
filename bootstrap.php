<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>

   <title>Home Zolvitek</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="zolvitek, web, design, programming, coding, development, ideas">
    <meta name="description" content="Zolvitek offers website design services focused on furthering your ideas by giving them added value, and making them unique.">
    <meta name="author" content="Pablo Cangas">
<script type="text/javascript" src="jquery-1.11.0.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>



    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">

<script>






//STARTS SCRIPTS WHEN PAGE IS READY
$(document).ready(function(){
	$('#login_button').click(function(event){//POP UPS LOGIN SCREEN WHEN CLICKING ON LOGIN BUTTON, THEN WAITS
		event.preventDefault();
		$('#muted_layer').fadeIn(800);
		$('#login_div').fadeIn(800);
		});
	$('#log_off').click(function(event){//DESTROYS SESSION WHEN LOGOFF IS CLICKED
		event.preventDefault();
		<?php session_unset(); 	?>
	});

	$('#login_submit').click(function(event){//TRIGGERS WHEN SUBMIT IS CLICKED, DEFINING VARIABLES
		event.preventDefault();
		$('#failedMsg').hide();//RESETS ERROR MSGS
		var email = $('#loginEmail').val();
		var password = $('#loginPassword').val();

		function loginResult(resultA){//CHECK IF AJAX RESPONSE IS TRUE AND EXECUTES LOGIN SUCCES ACTIONS, ELSE PROMPTS ERRORS
		if(resultA == 'Login Aproved'){
			$('.form-control').css('border', '1.7px solid #B7BBBD'); //RESETS FORM BORDERS TO DEFAULT
			$("#verificationMsg").fadeIn(600, function(){
				$('#login_div').fadeOut(1100);
				$('#muted_layer').fadeOut(1100);
				setTimeout(function(){window.location = 'protected_area.php';}, 900);//REDIRECTS TO PROTECTED AREA AFTER TIMEOUT
					});//close fadeIn callback function
				}//close if Aproved...
		else {
			$('#failedMsg').fadeIn(300);
			$('#loginEmail').css('border', 'red solid 2px');
			$('#loginPassword').css('border', 'red solid 2px');
			 console.log('Wrong email and password combination, please try again...')
			}
		}; //close loginResult function


		function loginAjax(emailA, passwordA, callback){
			$.ajax({
				url: "/process_signup.php",
				//dataType: "JSON",
				data: {
				zusername : 'login',
				zpassword : passwordA,
				zfname : 'login',
				zlname : 'login',
				zemail : emailA,
				zcountry : 'login',
				action : 'login'
				},
			success: function(response){
				var resd = JSON.parse(response);
				console.log('loginAjax response succesful');
				console.log(response);
				console.log(resd);
				callback(resd);//CALLS LOGINRESULT() TO DETERMINE IF LOGIN WAS SUCCESFUL OR NOT
				},
			error: function(xhr, textStatus, errorThrown) {
				}

			 }); //AJAX CLOSURE
		}; //close loginAjax function

		loginAjax(email, password, loginResult); //STARTS AJAX CALL, AND AFTER ITS DONE EXECUTES CALLBACK TO CHECK LOGIN RESULT
	}); //close submit click function

}); //close document.ready function
</script>

  </head>

  <body>

  <div id="muted_layer" style="width:100%; height: 1000px; display:none; opacity: 0.7; position:absolute; z-index: 2;background-color: black;border: 2px solid black;margin-top: -50px;">
  </div><!-- /MUTED LAYER -->

  <!-- SIGN UP POPUP-->

<div id="login_div" style="height: 450px; width: 450px; position: absolute; left: 30%; top: 10%; border: 2px solid black; border-radius: 10px; background: url('/images/popuporangebkgrnd.jpg') no-repeat center center ; z-index: 3; display: none;">
	<div style="padding:5%;">
	<form class="form-horizontal" role="form">
	  <div class="form-group">
	  <div style="text-align:center; margin-top:2%; margin-bottom:10%;">
	  	<label><h1 style="color: black;">Login Form</h1></label>
	  </div>

	    <div class="col-sm-12" id="verificationMsg" style="top:110px; left:140px; display:none; color:green; position:absolute; z-index:4;">
	      <h5><i>Login Succesful...</i></h5>
	    </div>
	    <div class="col-sm-12" id="failedMsg" style="top:110px; left:70px; display:none; color:red; position:absolute; z-index:5;">
	      <h5><i>Wrong username and password combination</i></h5>
	    </div>

	    <label for="loginEmail" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input class="form-control" id="loginEmail" placeholder="Email" type="email">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="loginPassword" class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-10">
	      <input class="form-control" id="loginPassword" placeholder="Password" type="password">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input type="checkbox"> Remember me
	        </label>
	      </div>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button style=" color: white; background-color: green; border:none;" id="login_submit" type="submit" class="btn btn-default"><strong>Log in</strong></button>
	    </div>
	  </div>
	</form>
  </div>

</div>

</div><!--LOGIN DIV END -->


    <div class="container" style="position:relative; z-index:1">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a class="home" href="/testy.php">Home</a></li>
          <li id="login_button"><a href="" >Log in</a></li>
          <li><a href="signup.php">Sign Up</a></li>
          <li><a id="log_off" href="/about.php">About</a></li>
        </ul>
        <a href="/testy.php"><img id="logo" src="/images/logo.jpg"></a>
        <h3 class="text-muted" ><p style="margin-left: 100px;">Zolvitek</p></h3>
        <h3 class="text-muted"><small><p style="margin-top: -20px; margin-left:150px;">Solving Technologies</p></small></h3>
      </div>




		<!-- Main Title Screen -->
      <div class="jumbotron">

        <h2 style="font-size:42px;">Sky Rocket Your Ideas</h2><br>
        <p class="lead" style="font-size: 17.3px; text-align:justify;"><i>Times are changing...Having merely a great idea is not enough. In a globalized world,
         being able to differenciate yourself from others and add value to your ideas is the best way to succed. That's
          where we come in...Let us further your dreams through website and plataform design!</i></p>
        <p><a class="btn btn-lg btn-success" href="/protected_area.php" role="button">Learn about Zolvitek!</a></p>
      </div>







      <div class="row marketing">
      <!-- Left Body Section Links -->
        <div class="col-lg-6">

		 <a class="body_section_links" href="/bootstrap.php">
		  <div class="body_links">

           	 <h4>Skills and Services </h4>
          	 <p>Learn about what we can offer and how we can back it up!</p>

          </div>
		 </a>

		 <a class="body_section_links" href="/portfolio.php">
		  <div class="body_links">

          	<h4>Portfolio</h4>
          	<p>See examples of great ideas we've pushed beyond their limits!</p>

          </div>
      	 </a>


		 <a class="body_section_links" href="/feedback.php">
		  <div class="body_links">

          	<h4>Client Feedback</h4>
          	<p>Learn a bit about what our customers felt while working with us!</p>

           </div>
      	 </a>



        </div> 	<!--End left Section-->



		<!-- Right Section Body links-->
        <div class="col-lg-6">

         <a class="body_section_links" href="/contactinfo.php">
		  <div class="body_links">
          	<h4>Contact Info</h4>
          	<p>Got any questions? Have any feedback? We are all about hearing from you!</p>
          </div>
      	 </a>


         <a class="body_section_links" href="/faq.php">
		  <div class="body_links">
          	<h4>F.A.Q</h4>
          	<p>Some short answers will put you up to speed about everything you need to know!</p>
          </div>
      	 </a>




		 <a class="body_section_links" href="/blog.php">
		  <div class="body_links">
         	 <h4>Blog Updates</h4>
         	 <p>So you loved this experience? Help Zolvitek by linking us to your website!</p>
          </div>
      	 </a>


        </div>
      </div> <!-- End Right Section-->




      <!--Footer-->
      <div class="footer">
        <p>&copy; Zolvitek 2014</p>
      </div>

    </div> <!-- /container -->




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>

