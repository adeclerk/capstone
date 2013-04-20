<?php
require_once('LlticDbConnection.inc.php');
require_once('User.inc.php');

$database = new LlticDbConnection();
	$result = $database->getConnection()->query("SELECT * FROM `users`");
	$row = $result->fetch_assoc();
	print $row['id'] . " <br/> " . $row['username'];

?>