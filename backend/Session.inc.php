<?php
require once 'LlticDbConnection.inc.php';
class Session
{

  private $isAlive;
 function __construct()
  {

    session_set_save_handler
    (
      array(&$this, 'open'),
      array(&$this, 'close'),
      array(&$this, 'read'),
      array(&$this, 'write'),
      array(&$this, 'destroy'),
      array(&$this, 'clean')
    );
 
    session_start();
  }

  function __destruct()
  {
    if($this->alive)
    {
      session_write_close();
      $this->isAlive = false;
    }
  }
}

?>
