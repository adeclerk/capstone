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
		$sql = "SELECT * from `employees`";

  		$result = $con->query($sql);
		print("<table>
				<tr style=\"text-align: left;\">
				    <th>id</th>
				    <th style=\"background-color: #C0C0C0;\">Name</th>
				    <th>Username</th>
				    <th style=\"background-color: #C0C0C0;\">Email</th>
				    <th>Phone</th>
				    <th style=\"background-color: #C0C0C0;\">Hire Date</th>
				    <th>Salary</th>
				    <th style=\"background-color: #C0C0C0;\">is admin</th>
			        </tr>");
				while ($row = $result->fetch_row()) {
				 print("<tr>
				         <td style=\"padding: 5px;\">$row[0]</td>
					 <td style=\"background-color: #C0C0C0;\">$row[1] $row[2]</td>
					 <td>$row[8]</td>
					 <td style=\"background-color: #C0C0C0;\">$row[3]</td>
					 <td>$row[9]</td>
					 <td style=\"background-color: #C0C0C0;\">$row[5]</td>
					 <td>$row[6]</td>
					 <td style=\"background-color: #C0C0C0;\">$row[7]</td>
				        </tr>");
       
    }
  print("</table>");
  		$con->close();
	


	?>
</body>

</html>