<?php
require ('LlticDbConnection.inc.php');
require_once ('User.inc.php');

$database = new LlticDbConnection();
  //$result = $database->users->getAllUsers();
//	print $result->getId();
	//$index = 0;
 // $user = $database->users->getUser();
  	$user = $database->users->getAllUsers();
  	$index = 0;
  		while($user[$index])
  		{
  			print $user[$index]->getId() . " : " . $user[$index]->getUsername() . " : " . $user[$index]->getPassword() . " : " . $user[$index]->getAdmin() . " <br />";
  			$index++;
  		}
  //	$user = $result;
  	//print $user->getId() . " : " . $user->getUsername() . " : " . $user->getPassword() . " : " . $user->getAdmin() . " <br />";
  

?>