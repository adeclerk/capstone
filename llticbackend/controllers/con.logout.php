<?php
require ('../classes/class.Session.php');
$session = new Session();
//$session->deauthorize();
$session->delete();
header("Location: http://". $_SERVER['SERVER_NAME'] ."/portal");

?>