<?php
require ('UserSession.inc.php');
$session = new UserSession();
$session->deauthorize();

header("Location: http://". $_SERVER['SERVER_NAME'] ."");

?>