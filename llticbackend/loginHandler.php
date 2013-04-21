<?php
require ('Session.inc.php');
$session = new Session();
error_reporting(E_ALL);

	$_SESSION['user'] = $_POST['username'];

?>