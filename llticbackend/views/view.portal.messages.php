<script type='text/javascript'>
function showCompose()
{
	var table = document.getElementById("inboxtable");
	table.style.display = 'none';
	var compose = document.getElementById("compose");
	compose.style.display = 'inline';

	var button = document.getElementById("button");
	button.style.textAlign = 'right';
	button.innerHTML = "<a href='#' onclick='showInbox()'>Back</a>";
}
</script>
<div style='text-align: right; width: 1080px;' id='button'>
<a href='#' onclick="showCompose()" >Compose</a>
</div>
<table id='inboxtable'>
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
<div id='compose' style='display: none;'>
	<?php print $this->composeTab->render(); ?>
</div>