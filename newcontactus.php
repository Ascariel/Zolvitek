
<script type="text/javascript" src="jquery-1.11.0.js"></script>
<link href="contact1.css" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="contact2.css" />
<style type="text/css">
    .form-label{
    	width:150px !important;
    }
.form-label-left{
	width:150px !important;
}
.form-line{
	padding-top:6px;
	padding-bottom:6px;
}
.form-label-right{
	width:150px !important;
}
.form-all{
	width:600px;
	background:#FFFFFF;
	color:#000000 !important;
	font-family:'Verdana';
	font-size:12px;
}
/* Injected CSS Code */
/*--red border on error--*/
.form-validation-error {
	border: 1px solid #FFB0B0 !important;
}/*---form textbox styles fixed---*/
.form-textarea, .form-textbox  {
	border: 1px solid #b7bbbd;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
	padding: 4px;
	background:transparent !important;
	width: 390px !important;
	max-width: 390px !important;
	-webkit-appearance: none;
	-webkit-box-shadow: inset 0 0 4px rgba(0,0,0,0.2), 0 1px 0 rgb(255,255,255);
	-moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2), 0 1px 0 rgb(255,255,255);
	box-shadow: inset 0 0 4px rgba(0,0,0,0.2), 0 1px 0 rgb(255,255,255);
	border: 1px solid #AEAEAE;
	color: #333;
	font-family:verdana !important;

}/*--form all styles--*/
.form-all{
	background:url("/images/envelope.jpg");
	background-size:100% 100%;
	float:left;
	padding-left: 14%;
	padding-top: 0px !important;
	width: 600px;
	height: 550px;
	margin-top: -15px;

}/*---remove error message---*/
.form-error-message {display: none !important;}
.form-line-error {
	background:none repeat scroll 0 0;
}
/*---button error move down---*/
.form-button-error {
	margin-right: 53px;
	margin-top: -8px;
	display: block !important;
}/*---submit button move--*/
.form-submit-button{
	margin-top:0px !important;
	cursor: pointer;
}#id_6{
	text-align: center !important;
	font-weight: bold !important;
	font-size: 25px !important;
	color: #3e83a5 !important;
	margin-right: 39px !important;
	font-family: arial !important;
	padding:0px !important;
}
#text_6{
	margin-right: 20px;
	padding-top: 10px;
}
.form-buttons-wrapper{
	margin-right: 60px;
}.form-textarea:focus, .form-textbox:focus{
	outline:none !important;
}/*--fix textarea height--*/
#input_4{
	height: 95px !important;
	max-height: 95px !important;
}/*--fix captcha--*/.form-captcha .form-textbox{
	width:130px !important;
}
/* Injected CSS Code */
</style>


<link type="text/css" rel="stylesheet" href="contact2.css"/>
<div id="ajax" style= "clear:both; color: white; font-size:16px; font-style: italic; margin-left: 18%; margin-top:-23px; margin-bottom: 18px;">as</div>
<form class="jotform-form" action="ajaxprocessing.php" method="post" name="form_40917357114655" id="40917357114655" accept-charset="utf-8">

  <div class="form-all">
    <ul class="form-section">
      <li class="form-line" id="id_6">
        <div id="cid_6" class="form-input-wide">
          <div id="text_6" class="form-html">
            <div style="text-align:center;">
              Contact Us
            </div>
          </div>
        </div>
      </li>

      <li class="form-line" id="id_1">
        <label class="form-label-top" id="label_1" for="input_1">
          Name<span class="form-required">*</span>
        </label>
        <div id="cid_1" class="form-input-wide">
          <input type="text" class=" form-textbox " data-type="input-textbox" id="input_1" name="q1_name" size="40" value="" /> <!--NAME INPUT-->
        </div>
      </li>
      <li class="form-line" id="id_3">
        <label class="form-label-top" id="label_3" for="input_3">
          E-mail<span class="form-required">*</span>
        </label>
        <div id="cid_3" class="form-input-wide">
          <input type="text" class=" form-textbox " data-type="input-textbox" id="input_3" name="q3_email" size="40" value="" /> <!--EMAIL INPUT-->
        </div>
      </li>

      <li class="form-line" id="id_4">
        <label class="form-label-top" id="label_4" for="input_4">
          Message<span class="form-required">*</span>
        </label>
        <div id="cid_4" class="form-input-wide">
          <textarea id="input_4" class="form-textarea " name="q4_message4" cols="40" rows="6"></textarea> <!--MESSAGE INPUT-->
        </div>
      </li>
      <li class="form-line" id="id_7">
        <div id="cid_7" class="form-input-wide">
          <div style="text-align:center" class="form-buttons-wrapper">
            <button id="input_7" type="submit" class="form-submit-button form-submit-button-book_blue2"> <!--BUTTON SUBMIT-->
              Mail Now!
            </button>
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>



</form>


<!--JAVASCRIPT AND AJAX -->
<script>
$(document).ready(function(){
	$('#input_7').click(function(event){
		event.preventDefault();

		$('.form-textbox').css('border', '1px solid #B7BBBD');
		$('.form-textarea').css('border', '1px solid #B7BBBD');

		//define variables and error msges
		var name = $("#input_1").val();
		if(name == ""){
			$("#input_1").css('border', '#FF4D4D solid 1.7px');
			$("#input_1").focus();

		};

		//define variables and error msges
		var email = $("#input_3").val();
		var $atPos = email.indexOf('@');
		var $dotPos = email.indexOf('.', $atPos);
		var $validEmail = ($atPos<1 || $dotPos<1 || ($dotPos - $atPos)<2)
		if($validEmail){
			$("#input_3").css('border', '#FF4D4D solid 1.7px');
			$("#input_3").focus();
			if(name == ""){
				$('#input_1').focus();
				  	}
			}




		var message = $('#input_4').val();
			if(message == ""){
			$('#input_4').css('border', '#FF4D4D solid 1.7px');
			$('#input_4').focus();
				if(email == ""){
				$('#input_3').focus();
								}
				if(name == ""){
					$('#input_1').focus();
				}
		}


		if(name == "" || email == "" || message == "") {
			$('#ajax').html("Please fill in the requested fields");
			$('#ajax').css('color', 'red');

			//alert('asdasdasda');
		}

		else if($validEmail){
		$('#ajax').html("Please use a valid email format (example@gmail.com)");
		$('#ajax').css('color', 'red');
		}

		else{


		$.ajax({
			url: "ajaxprocessing.php",
			dataType: "html",
			data : {
				sname: name,
				semail: email,
				smessage: message,
				sajax: true
			},
			success: function(response){
				$('#ajax').css('color', 'green');
				$("#ajax").html("...Sending your request...Wait a few seconds...").fadeOut(2000, function(){
						$("#ajax").html("Your message has been sent, thanks for aplying!").fadeIn(400);
				});
				$('#input_1').val('');
				$('#input_3').val('');
				$('#input_4').val('');
			//	alert(response);
			},
			error: function(xhr, textStatus, errorThrown) {

			}

		});

			}

	})
});







</script>
