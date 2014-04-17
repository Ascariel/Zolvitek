
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
//POP UPS LOGIN MSG WHEN CLICKING ON LOGIN BUTTON
$(document).ready(function(){
	$('#login_button').click(function(event){
		event.preventDefault();
		$('#login_div').fadeIn('slow');
			setTimeout(function(){ $('#login_div').fadeOut('slow'); }, 6000);

	});

});
</script>

  </head>

  <body>



    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a class="home" href="/testy.php">Home</a></li>
          <li id="login_button"><a href="" >Log in</a></li>
          <li><a href="signup.php">Sign Up</a></li>
          <li><a href="/about.php">About</a></li>
        </ul>
        <a href="/testy.php"><img id="logo" src="/images/logo.jpg"></a>
        <h3 class="text-muted" ><p style="margin-left: 100px;">Zolvitek</p></h3>
        <h3 class="text-muted"><small><p style="margin-top: -20px; margin-left:150px;">Solving Technologies</p></small></h3>
      </div>


	<!-- SIGN UP POPUP-->

	<div  id="login_div" style='height:450px; width:400px; text-align:center; position:absolute; margin-left:10%; border:2px solid black; background-color:#FF8C00; z-index:2; display:none;' >

    	<div class="row">
    		<div class="col-md-12">
    		<h1>Members Log In</h1>
		</div>


    	</div>
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
