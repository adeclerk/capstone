<script type='text/javascript'>
var vals = NULL;
var index = 0;
function addValue(json)
{
	vals[index] = JSON.parse(json);
	index++;
}

function showTable()
{
	document.write("<table id='clientTable'> \
			<tr> \
				<th>id</th> \
				<th>firstName</th> \
				<th>lastName</th> \
				<th>phone</th> \
				<th>company</th> \
				<th>country</th> \
				<th>consult date</th> \
				<th>user id </th> \
				<th>consult id </th> \
			</tr>");
	var count = 0;
	for(count = 0; count < index; count++)
	{
		document.write(" <tr> \
							<td>" + vals[count].id + "</td> \
							<td>" + vals[count].firstName + "</td> \
							<td>" + vals[count].lastName + "</td> \
							<td>" + vals[count].phone + "</td> \
							<td>" + vals[count].company + "</td> \
							<td>" + vals[count].country + "</td> \
							<td>" + vals[count].consult_date + " </td> \
							<td>" + vals[count].userID + " </td> \
							<td>" + vals[count].consultID + " </td> \
							</tr>");
	}
}


<?php
require ('classes/class.Client.php');

$clientTable = new Client();

$clients = $clientTable->getAllClients();

foreach($clients as $client)
	print "addValue(" . $client . ");";
print "showTable();";


?>
</script>