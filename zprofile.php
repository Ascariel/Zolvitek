<?php
session_start();

if(!isset($_SESSION['email'])){


	print '<script type="text/javascript">';
	print 'alert("Please signup/login to access this content");';
	print 'window.location = "testy.php";';
	print '</script>';
}

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
$(document).ready(function(){

			function ajax_sqs(){
			//SET VARIABLES

				var file = $('#input_file').val();
				console.log(file);
				console.log('sqs function working');

					$.ajax({
					url: '/zolvisqs.php',
					data: {
						zfile : file,
						action : 'sendM'
					},
					success: function(response){

					console.log('loginAjax response succesful');
					console.log(response);
					//var resd = JSON.parse(response);
					//console.log(resd);


					},
					error: function(xhr, textStatus, errorThrown) {
						console.log('weird error..')
					}

					}); //AJAX CLOSURE



			};//close ajaxsqs function

		$('#submit').click(function(event){
			event.preventDefault();
			console.log('submit click working')
			ajax_sqs();
		});
});

</script>

  </head>

  <body>


<?php include("includes/zheader.php")?>
<div class ="container" style="align: center;">

<form role="form">
  <div class="form-group">
    <!--
	<label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div> -->
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="input_file">
    <p class="help-block">Browse your PC to upload a profile picture</p>
  </div>

  </div>
  <button type="submit" class="btn btn-default" id="submit">Submit</button>
</form>

</div>

<?php include("includes/zfooter.php")?>




  </body>
</html>

