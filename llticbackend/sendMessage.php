<?php
require_once 'classes/class.Message.php';
require_once 'classes/class.Session.php';
require_once 'classes/class.User.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$messageTable = new Message();
	$userTable = new User();
	$user = $userTable->getIdByUsername($_POST['recip']);
	$messageTable->write($_SESSION['uid'],$user,$_POST['subject'],$_POST['content']);
}

?>