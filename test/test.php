<html>
<head>
	<title>Sample Email Form</title>
</head>
<body>
 
<script>
    function checkForm() {
	if (document.forms.myphpform.elements['yname'].value.length == 0) {
		alert('Please enter a value for the "Name" field');
        	return false;
    	}
	if (document.forms.myphpform.elements['email'].value.length == 0) {
		alert('Please enter a value for the "Email" field');
        	return false;
    	}
	if (document.forms.myphpform.elements['message'].value.length == 0) {
		alert('Please enter a value for the "Message" field');
        	return false;
    	}
 
        return true;
   }
</script>
<form action="?done=1" method="post" name="myphpform" onSubmit="return checkForm()"  >
<table border=0>
<tr>
<td>Your Name:</td>
<td>
<input type="text" name="yname" size="50" maxlength="50" value="" /></td>
</tr>
<tr>
<td>Your Email:</td>
<td>
<input type="text" name="email" size="50" maxlength="50" value="" /></td>
</tr>
<tr>
<td>Message:</td>
<td>
<input type="text" name="message" size="50" maxlength="50" value="" /></td>
</tr>
<tr>
<td>Are you a human being?</td>
<td>
<?php
 
@require_once('recaptchalib.php');
$publickey = "6LdvstASAAAAAFdYiGW6ASPvDT6u4P7eapH89jkn";
$privatekey = "6LdvstASAAAAAFdYiGW6ASPvDT6u4P7eapH89jkn";
 
$resp = null;
$error = null;
 
# are we submitting the page?
if ($_POST["submit"]) {
  $resp = recaptcha_check_answer ($privatekey,
                                  $_SERVER["REMOTE_ADDR"],
                                  $_POST["recaptcha_challenge_field"],
                                  $_POST["recaptcha_response_field"]);
 
  if ($resp->is_valid) {
	$to="you@example.com";
	$subject="Feedback from example.com";
        $body=" Message via webform:
 
Name: " .$_POST["yname"] . "\n
 
Email: " .$_POST["email"] . "\n
 
Message: " .$_POST["message"] . "\n";
        /*  send email */
	mail($to,$subject,$body);
	echo "
 
Email sent!
 
";
	exit(1);
 
  } else {
     	echo "Sorry cannot send email as you've failed to provide correct captcha! Try again...";
  }
}
echo recaptcha_get_html($publickey, $error);
?>
<td/>
	</tr>
<tr>
<td>&nbsp;</td>
<td>
<input type="submit" name="submit" value="submit" /></td>
</tr>
</table>
</form>
 
</body>
</html>