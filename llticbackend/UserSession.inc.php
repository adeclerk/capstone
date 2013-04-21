<?php
require_once ('Session.inc.php');

class UserSession
{
	private $session;
	private $user;
  public function __construct()
  {
  	$this->session = new Session();
  }

}

?>