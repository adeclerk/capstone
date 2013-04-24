<?php
require ('../classes/class.Session.php');
require ('../classes/class.Template.php');
require ('../controllers/Portal.AdminMain.php');

$controller = new AdminMain();
$controller->invoke();

?>