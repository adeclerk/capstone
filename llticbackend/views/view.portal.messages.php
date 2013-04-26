<script type='text/javascript'>
var openMessage = NULL;
function showCompose()
{
	var table = document.getElementById("inboxtable");
	table.style.display = 'none';
	var compose = document.getElementById("compose");
	compose.style.display = 'inline';
	compose.style.zIndex ='10';
	compose.style.cssFloat ='left';

	var button = document.getElementById("button");
	button.style.textAlign = 'right';
	button.style.width = '800px;';
	button.innerHTML = "<a href='#' onclick='showInbox()'>Back</a>";

	var title = document.getElementById("inbox_title");
	title.innerHTML = "Compose Message";
}

function showInbox()
{
	var button = document.getElementById("button");
	button.style.textAlign = 'right';
	button.innerHTML = "<a href='#' onclick='showCompose()'>Compose</a>";
	var table = document.getElementById("inboxtable");
	table.style.display='table';
	var compose = document.getElementById("compose");
	compose.style.display='none';

	var title = document.getElementById("inbox_title");
	title.innerHTML = "Inbox";
}

function showMessage(id)
{
	var message = document.getElementById("msg_"+id);
	message.style.display = 'inline';
	message.style.width = '800px';
	var table = document.getElementById("inboxtable");
	table.style.display='none';

	var button = document.getElementById("button");
	button.innerHTML = "<a href='#' onclick='hideMessage()'><- Back</a>";

	openMessage = message;
	
}

function hideMessage()
{
	var message = openMessage;
	message.style.display = 'none';
	var table = document.getElementById("inboxtable");
	table.style.display='table';
}
	
</script>
<div style='text-align: right; width: 800px;' id='button'>
<a href='#' onclick="showCompose()" id='buttonlink' >Compose</a>
</div>
<table id='inboxtable' style='width: 800px;'>
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
			. "<a href='#' onclick=\"showMessage(" . $message->id . ")\">" .$message->sub . "</a></td>\n\t</tr>";
	}
			
		?>

</table>
<div id='compose' style='display: none; width: 800px;'>
	<?php print $this->composeTab->render(); ?>
</div>

<?php 
	foreach($this->messages as $message)
	{
		print "<div id='msg_" . $message->id . "' style='display: none;'>";
		//print "<div style='text-align: left;' onclick='hideMessage(" . $message->id . "><- Back</div>";
		print "<div style='text-align: left;'>" . $message->sender . " | " . $message->timestamp . "</div><hr/>";
		print "<div style='text-align: left;'>Subject: " . $message->sub . " </div>";
		print $message->content . "</div>";
	}
?>