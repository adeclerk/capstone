<script type='text/javascript'>
function showCompose()
{
	var request = new XMLHttpRequest();
	request.open("POST","/portal/admin.php"true);
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	request.send("msgs=TRUE");

	request.onreadystatechange=function()
	{
		var windowContent = document.getElementById("inbox");
		windowContent.innerHTML = request.responseText;
	}
}
</script>
<div style='text-align: right;'>
<a href='#' onclick="showCompose()" >Compose</a>
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
		print "\n\t<tr>\n\t\t<td>" . $message->sender . "</td>\n\t\t<td>"
			. $message->recip . "</td>\n\t\t<td>" . $message->timestamp . "</td>\n\t\t<td>"
			. $message->sub . "</td>\n\t</tr>";
	}
			
		?>

</table>