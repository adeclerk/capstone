<form id='sendMessage' method='post' action='sendMessage.php'>
Recipient: <select name='recip'>
<?php
foreach($this->username as $user)
	print "<option value='"
			. $user->uname ."'>" . $user->uname 
			. " (" . $user->fullname['firstName'] . " " 
			. $user->fullname['lastName'] . ") " . "</option>";
?>
	</select>
	Subject: <input type="text" name="subject" size='45'><br/>
	Content: <br/><textarea style='width: 90%; height: 70%;' name='content'></textarea>
	<input type="submit" value="submit" name="submitForm">
</form>