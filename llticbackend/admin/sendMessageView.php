<form id='sendMessage' method='post' action='sendMessage.php'>
	Recipient: <select id='recip'>
		<?php 
		foreach($this->username as $user)
			print "<option value='". $user ."'>" . $user . " " . "</option>";
		?>
	</select>
	Subject: <input type="text" id="subject"><br/>
	Content: <br/><textarea style='width: 90%; height: 70%;' id='content'></textarea>
	<input type="submit" value="submit" id="submitForm">
</form>