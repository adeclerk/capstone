<html>
<head>
</head>

<body>
  <?php
	if($_POST['formSubmit'] == "Submit")
	{
		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$company = $_POST['company'];
		$email = $_POST['email'];
		$phone = $_POST['ccode'] + $_POST['areacode'] + $_POST['pnumber0'] + $_POST['pnumber1'];
		$country = $_POST['country'];
	}


	?>
</body>

</html>
