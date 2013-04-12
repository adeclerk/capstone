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
		// Create connection	
			// server, user, password, database
		$con=mysqli_connect("example.com","peter","abc123","my_db");

		// Check connection
		if (mysqli_connect_errno($con))
  		{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
  		
  		mysqli_close($con);
	}


	?>
</body>

</html>
