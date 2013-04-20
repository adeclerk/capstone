<?php
require ('LlticDbConnection.inc.php');
require_once ('User.inc.php');

$database = new LlticDbConnection();
  //$result = $database->users->getAllUsers();
//	print $result->getId();
	//$index = 0;
 // $user = $database->users->getUser();
  	$user = $database->users->getAllUsers();
  	print sizeof($user);
  	//$index = 0;

  		//print $user->getUsername();
  	
  //	$user = $result;
  	//print $user->getId() . " : " . $user->getUsername() . " : " . $user->getPassword() . " : " . $user->getAdmin() . " <br />";
  

?>