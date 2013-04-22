<?php
require_once('../LlticDbConnection.inc.php'); 
require_once('../User.inc.php');
require_once ('../classes/class.Template.php');

$dbcon = new LlticDbConnection();
$users = $dbcon->users->getAllUsers();

$usernames = array();
for($i=0;$i<sizeof($users);$i++)
{
	array_push($usernames,$users[$i]->getUsername());
}
$main = new Template('sendMessageView.php', array(
		'username' => $usernames));
$main->render();
?>