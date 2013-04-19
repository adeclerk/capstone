<html>
<head>
</head>

<body>
  <?php
		// Create connection	
			// server, user, password, database
		$con= new mysqli("192.168.1.102","admin","llticewok","lltic");

		// Check connection
		if ($con->connect_errno)
  		{
  		echo "Failed to connect to MySQL: " . $con->connect_erro;
  		}
		$sql = "SELECT * from `pending_clients` ORDER BY
		contactDT DESC";
  		$result = $con->query($sql);
print("<table><tr style=\"text-align: left;\"><th>Name</th><th>Company</th><th>email</th><th>Country</th><th>Phone</th><th>Contact
		Time</th></tr>");
    while ($row = $result->fetch_row()) {
       // printf ("%s (%s)\n", $row[0], $row[1]);
  print("<tr><td style=\"padding: 5px; \">$row[1] $row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td></tr>");
       
    }
  print("</table>");
  		$con->close();
	


	?>
</body>

</html>