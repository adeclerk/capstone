<?php
session_start();
require ('class.Login.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST')
  {
  	$login = Login();
    $login->login($_POST['username'],$_POST['password']);
    
  }
?>