<?php
require ('LlticDbConnection.inc.php');
require_once ('User.inc.php');

$databasee = new LlticDbConnection();
  //$result = $database->users->getAllUsers();
//	print $result->getId();
	//$index = 0;
 // $user = $database->users->getUser();
  	/*$user = $database->users->getAllUsers();
	for($i = 0; $i < sizeof($user); $i++)
	{
  		print $user[$i]->getId() . " : " . $user[$i]->getUsername() . " : " . $user[$i]->getPassword() . " : " . $user[$i]->getAdminStatus() . " <br />";
	}
*/
	$result = $databasee->users->findUser("samobrin");
	if(!$result)
		print "FALSE";
	print $result;
?>