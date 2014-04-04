<?

	if (isset($_REQUEST['fajax'])) {


		echo "I was replaced!!! <br>";
		echo "me tooo!!";
		return;
	}
?>
<!DOCTYPE html>
<html>

<head>

<link ref="jquery.css" rel="stylesheet">

<script type="text/javascript" src="jquery-1.11.0.js"></script>
</head>

<body>


<div id="contact_form">
<form name="contact" action="">
  <fieldset>

    <label for="name" id="name_label">Name</label>
    <input type="text" name="name" id="name" size="30" value="" class="text-input" />
    <label class="error" for="name" id="name_error">This field is required.</label>

    <label for="email" id="email_label"> Email</label>
    <input type="text" name="email" id="email" size="30" value="" class="text-input" />
    <label class="error" for="email" id="email_error">This field is required.</label>

    <label for="phone" id="phone_label"> Phone</label>
    <input type="text" name="phone" id="phone" size="30" value="" class="text-input" />
    <label class="error" for="phone" id="phone_error">This field is required.</label>

      <br />
    <input type="submit" name="submit" class="button" id="submit_btn" value="Send" />
  </fieldset>
</form>



<p id="msg"> Im going to be replaced by ajax without refreshing the browser! </p>
<p id="rep">I want to be replaced too</p>
</div>

<!--JQUERY SCRIPT-->

<script>


$(document).ready(function() {
	$(".button").click(function(){
		// process and validate form$

		$('.error').hide();

		var name = $("input#name").val();
		if(name == "") {
			$("label#name_error").show();
			$("input#name").focus();
			return false;
		}

		var email = $("input#email").val();
		if(email == ""){
			$("label#email_error").show();
			$("input#email").focus();
			return false;
		}

		var phone = $("input#phone").val();
		if(phone === ""){
			$("label#pnone_error").show();
			$("input#phone").focus();
			return false;
		}

	     $.ajax({
	      url: "/jquery.php",
	      dataType: "html",
	      data : {
	       femail : email,
	       fphone : phone,
		   fajax: true
	      },
	      success: function(response){
			$('#msg').html(response);
	      	response;

	      },
	      error: function(xhr, textStatus, errorThrown) {

	      }
	     });
	return false;
	});
});
</script>





</body>


</html>
