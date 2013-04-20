<?php
require_once('LlticDbConnection.inc.php');
require_once('User.inc.php');

$database = new LlticDbConnection();
$users = $database->users->getAllUsers();

 print $users[0]->username;


?>