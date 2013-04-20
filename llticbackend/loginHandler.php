<?php
require ('class.Login.php');
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST')
  {
  	$login = Login();
   // $login->login($_POST['username'],$_POST['password']);
    
  }
?>