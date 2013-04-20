<?php
require ('LlticDbConnection.inc.php');
require_once ('User.inc.php');

$database = new LlticDbConnection();
  //$result = $database->users->getAllUsers();
//	print $result->getId();
	//$index = 0;
 // $user = $database->users->getUser();
  	$user = $database->users->getUser();
  	//$index = 0;

  	//		print "$user[0]->getId() : $user[0]->getUsername() : $user[0]->getPassword() : $user[0]->getAdmin() <br />";
  	
  //	$user = $result;
  	print $user->getId() . " : " . $user->getUsername() . " : " . $user->getPassword() . " : " . $user->getAdmin() . " <br />";
  

?>