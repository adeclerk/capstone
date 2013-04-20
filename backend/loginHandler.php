<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST')
  {
    login($_POST['username'],$_POST['password']);
    
  }
?>