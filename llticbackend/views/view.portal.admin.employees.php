<script type="text/javascript">
function editEmployee(id)
{
	var row = document.getElementById(id);
	row.style.display = 'none';
	row = document.getElementById(id+"_edit");
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
	foreach($this->employees as $employee)
	{
		print "<tr id='". $employee->id . "'>\n\t";
		print "<td>" .$employee->id . "</td>\n\t";
		print "<td>" . $employee->firstName . "</td>\n\t";
		print "<td>" . $employee->lastName . "</td>\n\t";
		print "<td>" . $employee->hireDate . "</td>\n\t";
		print "<td>" . $employee->country .  "</td>\n\t";
		print "<td>" . $employee->salary . "</td>\n\t";
		print "<td>" . $employee->phone . "</td>\n\t";
		print "<td><a href='#' onclick='editEmployee(" . $employee->id. ")'>edit</a></td>\n";
		print "</tr>";
		
		print "<form id='edit_emp_" . $employee->id  ."' action='editEmployee.php' method='post'>\n";
		print "<tr id='". $employee->id  . "_edit' style='display: none;'>\n\t";
		print "<td><input type='text'  name='id' size='4' value='" . $employee->id  . "'></td>\n\t";
		print "<td><input type='text' name='firstName'  value='" . $employee->firstName . "'></td>\n\t";
		print "<td><input type='text' name='lastName' value='" . $employee->lastName . "'></td>\n\t";
		print "<td><input type='text' name='hireDate' value='" . $employee->hireDate . "'></td>\n\t";
		print "<td><input type='text' name='country' value='" . $employee->country . "'></td>\n\t";
		print "<td><input type='text' name='salary' value='" . $employee->salary. "'></td>\n\t";
		print "<td><input type='text' name='phone' value='" . $employee->phone . "'></td>\n\t";
		print "<td><a href='#' onclick='formSubmit(" . $employee->id  . ")'>save</a></td>\n";
		print "</tr>";
		print "</form>";
	}
	?>

</table>