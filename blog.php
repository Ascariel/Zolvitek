<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Zolvitek's Blog </title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/blog.css" rel="stylesheet">


  </head>

  <body>






    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="#">Home</a>
          <a class="blog-nav-item" href="#">New features</a>
          <a class="blog-nav-item" href="#">Press</a>
          <a class="blog-nav-item" href="#">New hires</a>
          <a class="blog-nav-item" href="#">About</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Zolvitek's Blog</h1>
        <p class="lead blog-description">Solving Technologies</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">

<?php


// CONNECT TO THE DATABASE
$con=mysqli_connect("localhost","root","palomo86","zolvitek");
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


	//DEFINE TITLE AND BODY INTO VARIABLES, FROM DE SUBMIT FORM
//$title= $_POST[title];
//$body= $_POST[body];
//INSERT TITLE AND BODY INTO TABLE

if(isset($_POST['title']) && isset($_POST['body'])){


$time = date("Y-m-d G:i:s");
$sql = "INSERT INTO Blog_Posts (Title, Body, Date) VALUES ('$_POST[title]', '{$_POST['body']}', '$time')";

if (!mysqli_query($con,$sql))
{
	die('Error: ' . mysqli_error($con));
}

}
else {
}




// A QUICK QUERY ON A FAKE UsSER TABLE
$result = mysqli_query($con, "SELECT * FROM Blog_Posts ORDER BY Date DESC");

while($row = mysqli_fetch_array($result))
{


 ?>

		<div class="blog-post">
            <h2 class="blog-post-title"> <?php 	echo $row['Title'] ?> </h2><br>
            <p class="blog-post-meta"><?php echo $row['Body']; ?> </p>

			<hr>
           <p style="font-size:16px; color: grey; margin-top:-15px;  "><i> <?php echo $row['Date'];

		?></i></p>

          </div><!-- /.blog-post -->


	<?php
}

// CLOSE CONNECTION
mysqli_close($con);

?>

</p>




          </div><!-- /.blog-post -->


        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
              <li><a href="#">March 2013</a></li>
              <li><a href="#">February 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <div class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>