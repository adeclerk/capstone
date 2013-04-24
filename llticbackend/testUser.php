<?php
require ('classes/class.User.php');
require ('classes/class.Session.php');
$session = new Session();
$userTable = new User();

print $userTable->read(2);
$_SESSION['test'] = testVal;
print $session->getId();
session_write_close();

?>