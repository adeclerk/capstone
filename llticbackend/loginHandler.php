<?php
//require ('Session.inc.php');

require('class.Login.php');

error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST')
  {
	$logmein = LoginUser();
	if(!$logmein->loginUser($_POST['username'],$_POST['password']))
			{
			print 'Error invalid username or password';
			}
  }
?>