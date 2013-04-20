<?php
//require ('Session.inc.php');

require('class.Login.php');

error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST')
  {
  	print "IN";
	$logmein = LoginUser();
	$logmein->loginUser($_POST['username'],$_POST['password']);
    
  }
?>