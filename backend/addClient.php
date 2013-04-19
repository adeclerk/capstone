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

		$phone = $_POST['ccode'].$_POST['areacode'].$_POST['pnumber0'].$_POST['pnumber1'];

		$country = $_POST['country'];

		// Create connection	
			// server, user, password, database
		$con= new mysqli("192.168.1.102","admin","llticewok","lltic");

		// Check connection
		if ($con->connect_errno)
  		{
  		echo "Failed to connect to MySQL: " . $con->connect_erro;
  		}
		$sql = "INSERT INTO `lltic`.`pending_clients` (`id`, `firstName`, `lastName`, `company`, `email`, `password`, `country`, `phone`, `contactDT`, `consultantID`) VALUES (NULL, '$firstName', '$lastName', '$company', '$email', NULL, '$country', '$phone', CURRENT_TIMESTAMP, NULL);";
  		$con->query($sql);
  		$con->close();
	}


	?>
</body>

</html>