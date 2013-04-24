<?php
require ('controllers/Controller.php');
require_once('controllers/Portal.AdminMain.php');

$controller = new AdminMain();
$controller->invoke();
?>