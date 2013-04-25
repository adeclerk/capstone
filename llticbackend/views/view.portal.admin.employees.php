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

function addEmployeeSubmit()
{
	var form = document.getElementById("add_employee");
	form.submit();
}
function addEmployee()
{
	var tmp = document.getElementById("add_emp");
	tmp.style.display = 'table-row';
}

function addEmployeeView()
{
	var window = document.getElementById("employees_content");
	var form = document.getElementById("add_emp");
	form.style.display = 'table-row';
	window.innerHTML="Add Employee" + form;
}
</script>
<div style='text-align: right; height: 10px;'>
	<input type="button" name="add" value="Add" onclick='addEmployeeView()'>
</div>
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
	print "<form id='add_employee' action='/portal/admin.php' method='post'>\n";
	print "<input type='hidden' name='addemployee' value='addemployee'>\n";
	print "<tr id='add_emp' style='display: none;'>\n\t";
	print "<td><input type='text'  name='uid' size='4'></td>\n\t";
	print "<td><input type='text' name='firstName'></td>\n\t";
	print "<td><input type='text' name='lastName'></td>\n\t";
	print "<td><input type='text' name='hireDate'></td>\n\t";
	print "<td><input type='text' name='country'></td>\n\t";
	print "<td><input type='text' name='salary'></td>\n\t";
	print "<td><input type='text' name='phone'></td>\n\t";
	print "<td><a href='#' onclick='addEmployeeSubmit()'>save</a></td>\n";
	print "</tr>";
	print "</form>";
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
		
		print "<form id='edit_emp_" . $employee->id  ."' action='/portal/admin.php' method='post'>\n";
		print "<input type='hidden' name='eid' value='" . $employee->id . "'>";
		print "<tr id='". $employee->id  . "_edit' style='display: none;'>\n\t";
		print "<td><input type='text'  name='id' size='4' value='" . $employee->id  . "'></td>\n\t";
		print "<td><input type='text' name='firstName'  value='" . $employee->firstName . "'></td>\n\t";
		print "<td><input type='text' name='lastName' value='" . $employee->lastName . "'></td>\n\t";
		print "<td><input type='text' name='hireDate' value='" . $employee->hireDate . "'></td>\n\t";
		print "<td><input type='text' name='country' value='" . $employee->country . "'></td>\n\t";
		print "<td><input type='text' name='salary' value='" . $employee->salary. "'></td>\n\t";
		print "<td><input type='text' name='phone' value='" . $employee->phone . "'></td>\n\t";
		print "<input type='hidden' name='uid' value='" . $employee->userID . "'>";
		print "<td><a href='#' onclick='formSubmit(" . $employee->id  . ")'>save</a></td>\n";
		print "</tr>";
		print "</form>";
	}
	?>

</table>