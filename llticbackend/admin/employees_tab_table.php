<?php
require_once('../LlticDbConnection.inc.php');
?>
<table style='width: 100%;'>
	<tr>
		<th>ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Hire Date</th>
		<th>Country</th>
		<th>Salary</th>
		<th>Phone</th>
		<th></th>
	</tr>
	<?php 
	$db = new LlticDbConnection();
	$result = $db->qry("SELECT * FROM `employees`");
	while($row = $result->fetch_assoc())
	{
		print "<tr>\n\t";
		print "<td>" .$row['id'] . "</td>\n\t";
		print "<td>" . $row['firstName'] . "</td>\n\t";
		print "<td>" . $row['lastName'] . "</td>\n\t";
		print "<td>" . $row['hireDate'] . "</td>\n\t";
		print "<td>" . $row['country'] . "</td>\n\t";
		print "<td>" . $row['salary'] . "</td>\n\t";
		print "<td>" . $row['phone'] . "</td>\n\t";
		print "<td><a href=''>edit</a></td>\n"
		print "</tr>";
	}
	?>

</table>