<?php
require_once('../LlticDbConnection.inc.php');
?>
<script type="text/javascript">
function editEmployee($id)
{

}
</script>
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
		print "<tr id='". $row['id'] . "'>\n\t";
		print "<td>" .$row['id'] . "</td>\n\t";
		print "<td>" . $row['firstName'] . "</td>\n\t";
		print "<td>" . $row['lastName'] . "</td>\n\t";
		print "<td>" . $row['hireDate'] . "</td>\n\t";
		print "<td>" . $row['country'] . "</td>\n\t";
		print "<td>" . $row['salary'] . "</td>\n\t";
		print "<td>" . $row['phone'] . "</td>\n\t";
		print "<td><a href='#' onclick='editEmployee(" . $row['id']. ")'>edit</a></td>\n";
		print "</tr>";
		
		print "<tr id='". $row['id'] . "_edit' style='display: none;'>\n\t";
		print "<form id='edit_emp_" . $row['id'] ."' action='editEmployee.php'>\n";
		print "<td><input name='id' type='text' value='" .$row['id'] . "'></td>\n\t";
		print "<td><input name='firstName' type='text' value='" . $row['firstName'] . "'></td>\n\t";
		print "<td><input name='lastName' type='text' value='" . $row['lastName'] . "'></td>\n\t";
		print "<td><input name='hireDate' type='text' value='" . $row['hireDate'] . "'></td>\n\t";
		print "<td><input name='country' type='text' value='" . $row['country'] . "'></td>\n\t";
		print "<td><input name='salary' type='text' value='" . $row['salary'] . "'></td>\n\t";
		print "<td><input name='phone' type='text' value='" . $row['phone'] . "'></td>\n\t";
		print "<td><a href='#' onclick=''>save</a></td>\n";
		print "</tr>";
	}
	?>

</table>