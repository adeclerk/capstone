<?php
require_once('../LlticDbConnection.inc.php');

$db = new LlticDbConnection();
$sql = "REPLACE INTO `employees` (`id`,`firstName`,`lastName`,`hireDate`,`salary`,`country`,`phone`) VALUES('"
		. $_POST['id'] . "','" . $_POST['firstName'] . "','" 
		. $_POST['lastName'] . "','" .$_POST['hireDate'] . "','"
		. $_POST['salary'] . "','" . $_POST['country'] . "','"
		. $_POST['phone'] . "')";
$result = $db->qry($sql);

header ('Location: http://' . $_SERVER['SERVER_ADDR'] . '/admin');

?>