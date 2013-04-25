<?php
require_once 'classes/class.Message.php';
require_once 'classes/class.Session.php';
require_once 'classes/class.User.php';

$session = new Session();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$messageTable = new Message();
	$userTable = new User();
	$user = $userTable->getIdByUsername($_POST['recip']);
	
	print $_SESSION['uid'] . " <br/>"
			. $user . "<br/>"
			. $_POST['subject'] . "<br/>"
			. $_POST['content'];
	$messageTable->write($_SESSION['uid'],$user,$_POST['subject'],$_POST['content']);
}

?>