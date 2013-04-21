<?php
require ('Session.inc.php');
$session = new Session();
//$session->deauthorize();
$session->delete();
header("Location: http://". $_SERVER['SERVER_NAME'] ."");

?>