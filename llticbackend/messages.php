<?php
require_once ('classes/class.Message.php');
require_once ('classes/class.Session.php');
$session = new Session();
$msgTable = new Message();

$ret = $msgTable->getAllUnread($_SESSION['uid']);

print json_encode($ret);
?>