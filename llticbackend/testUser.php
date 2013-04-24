<?php
require ('classes/class.User.php');

$userTable = new User();

print $userTable->read(2);

?>