<?php
require_once('UserSession.inc.php');
$session = new UserSession();
$session->deauthorize();

header("Location: ". $_SERVER['HTTP_REFERER']);

?>