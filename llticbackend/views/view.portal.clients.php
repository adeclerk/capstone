<script type="text/javascript">
function editclient(id)
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

function addclientSubmit()
{
	var form = document.getElementById("add_client");
	form.submit();
}
function addclient()
{
	var tmp = document.getElementById("add_emp");
	tmp.style.display = 'table-row';
}

function addclientView()
{
	var empwindow = document.getElementById("clients_content");
	//var form = document.getElementById("add_emp");
	//form.style.display = 'table-row';
	var request = new XMLHttpRequest();
	request.open("GET","/portal/views/view.portal.admin.clients.addForm.php",true);
	request.send();
	request.onreadystatechange=function()
	{
		empwindow.innerHTML= request.responseText;
	}
}

function showclients()
{
	
}
</script>
<div style='text-align: right; height: 10px;'>
	<input type="button" name="add" value="Add" onclick='addclientView()'>
</div>
<table style='width: 100%;'>
	<tr>
		<th>ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Contact Date</th>
		<th>Country</th>
		<th>Company</th>
		<th>Phone</th>
		<th></th>
	</tr>
	<?php 
	print "<form id='add_client' action='/portal/admin.php' method='post'>\n";
	print "<input type='hidden' name='addclient' value='addclient'>\n";
	print "<tr id='add_emp' style='display: none;'>\n\t";
	print "<td><input type='text'  name='uid' size='4'></td>\n\t";
	print "<td><input type='text' name='firstName'></td>\n\t";
	print "<td><input type='text' name='lastName'></td>\n\t";
	print "<td><input type='text' name='consult_date'></td>\n\t";
	print "<td><input type='text' name='country'></td>\n\t";
	print "<td><input type='text' name='company'></td>\n\t";
	print "<td><input type='text' name='phone'></td>\n\t";
	print "<td><a href='#' onclick='addclientSubmit()'>save</a></td>\n";
	print "</tr>";
	print "</form>";
	foreach($this->clients as $client)
	{
		print "<tr id='". $client->id . "'>\n\t";
		print "<td>" .$client->id . "</td>\n\t";
		print "<td>" . $client->firstName . "</td>\n\t";
		print "<td>" . $client->lastName . "</td>\n\t";
		print "<td>" . $client->consult_date . "</td>\n\t";
		print "<td>" . $client->country .  "</td>\n\t";

		print "<td>" . $client->phone . "</td>\n\t";
		print "<td><a href='#' onclick='editclient(" . $client->id. ")'>edit</a></td>\n";
		print "</tr>";
		
		print "<form id='edit_emp_" . $client->id  ."' action='/portal/admin.php' method='post'>\n";
		print "<input type='hidden' name='eid' value='" . $client->id . "'>";
		print "<tr id='". $client->id  . "_edit' style='display: none;'>\n\t";
		print "<td><input type='text'  name='id' size='4' value='" . $client->id  . "'></td>\n\t";
		print "<td><input type='text' name='firstName'  value='" . $client->firstName . "'></td>\n\t";
		print "<td><input type='text' name='lastName' value='" . $client->lastName . "'></td>\n\t";
		print "<td><input type='text' name='hireDate' value='" . $client->consult_date . "'></td>\n\t";
		print "<td><input type='text' name='country' value='" . $client->country . "'></td>\n\t";

		print "<td><input type='text' name='phone' value='" . $client->phone . "'></td>\n\t";
		print "<input type='hidden' name='uid' value='" . $client->userID . "'>";
		print "<td><a href='#' onclick='formSubmit(" . $client->id  . ")'>save</a></td>\n";
		print "</tr>";
		print "</form>";
	}
	?>
</table>