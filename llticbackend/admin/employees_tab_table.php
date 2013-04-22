<?php
require_once('../LlticDbConnection.inc.php');
?>
<script type="text/javascript">
function editEmployee(id)
{
	var row = document.getElementById(id);
	row.style.display = 'none';
	row = document.getElementById($id+"_edit");
	row.style.display = 'table-row';
}
function formSubmit(id)
{
	var form = document.getElementById("edit_emp_"+id);
	form.submit();
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
		
		print "<form id='edit_emp_" . $row['id'] ."' action='editEmployee.php' method='post'>\n";
		print "<tr id='". $row['id'] . "_edit' style='display: none;'>\n\t";
		print "<td><input type='text'  name='id' size='4' value='" .$row['id'] . "'></td>\n\t";
		print "<td><input type='text' name='firstName'  value='" . $row['firstName'] . "'></td>\n\t";
		print "<td><input type='text' name='lastName' value='" . $row['lastName'] . "'></td>\n\t";
		print "<td><input type='text' name='hireDate' value='" . $row['hireDate'] . "'></td>\n\t";
		print "<td><input type='text' name='country' value='" . $row['country'] . "'></td>\n\t";
		print "<td><input type='text' name='salary' value='" . $row['salary'] . "'></td>\n\t";
		print "<td><input type='text' name='phone' value='" . $row['phone'] . "'></td>\n\t";
		print "<td><a href='#' onclick='formSubmit(" .$row['id'] . ")'>save</a></td>\n";
		print "</tr>";
		print "</form>";
	}
	?>

</table>