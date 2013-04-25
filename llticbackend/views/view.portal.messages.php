<script type='text/javascript'>
function showCompose()
{
	var table = document.getElementById("inboxtable");
	table.style.display = none;
	var compose = document.getElementById("compose");
	compose.style.display = inline;
	
}
</script>
<div style='text-align: right;'>
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