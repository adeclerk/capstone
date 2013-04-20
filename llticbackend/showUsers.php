<?php
require ('LlticDbConnection.inc.php');
require_once ('User.inc.php');

$database = new LlticDbConnection();
  //$result = $database->users->getAllUsers();
//	print $result->getId();
	//$index = 0;
  while($user = $database->users->getUser())
  {
  	print $user->getId() . " : " . $user->getUsername() . " : " . $user->getPassword() . " : " . $user->getAdmin() . " <br />";
  }

?>