<div style='text-align: right;'>
Compose
</div>
<table>
	<tr>
		<th>Sender</th>
		<th>Recipient</th>
		<th>Time</th>
		<th>Subject</th>
		<th></th>
	</tr>
	<?php 
	foreach($this->messages as $message)
	{
		print "\n\t<tr>\n\t\t<td>" . $message->sId . "</td>\n\t\t<td>"
			. $message->rId . "</td>\n\t\t<td>" . $message->timestamp . "</td>\n\t\t<td>"
			. $message->sub . "</td>\n\t</tr>";
	}
			
		?>

</table>