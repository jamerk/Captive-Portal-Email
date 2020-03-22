<html lang="en">
<head>
<title>Guest Wireless Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

<!-- Bringing in jQuery for a little button clicking later -->
<script src="jquery.min.js"></script>

<!-- And the jQuery Validation plug-in to validate emails -->
<script src="jquery.validate.min.js"></script>

</head>

<!-- This scripting piece allows us to submit our emails WITHOUT reloading the page, -->
<!-- we need to submit to the Unifi controller and our DB in one go -->
<!-- We're also validating emails before we allow a submission here -->
<script type="text/javascript">
	$(document).ready( function () {
		$("#form1").submit( function () {
			if($(this).valid()) {
			var formdata = $(this).serialize();
			$.ajax({
			    type: "POST",
			    url: "submit.php",
			    data: formdata
			 })};
			$("#form2").submit()
			return false;
		});
	});
</script>

<body class="text-center">
<h1 class="h3 mb-3 font-weight-normal">Sign in Below for Free Wifi</h1>
<form id="form1">
Enter Your Email Address:<br>
<input id="emailField" type="email" name="emails" required><br><br>
<?php
        echo '<input type="hidden' . '" name="mac' . '" value=' . '"' . $_GET["id"] . '">';
?>
<input type="submit" name="Submit" id="submitbutton" class="btn btn-lg btn-primary" value="Connect">
</form>

<!-- Yes this part is a little wonky, here we are taking the client MAC address from the URL generated -->
<!-- by the Unifi wireless and kicking it over to the unifi.php script that will authorize that client -->
<!-- when submit is clicked. -->
<form method=GET action="unifi.php" id="form2">
<?php
	echo '<input type="hidden' . '" name="id' . '" value=' . '"' . $_GET["id"] . '">';
?>
</form>
</body>
</html>
