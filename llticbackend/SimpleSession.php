<?php
require_once 'LlticDbConnection.inc.php';

class SimpleSession
{
  $db;
  public function __construct()
  {
    $db = new LlticDbConnection;
  }

  public function __desctruct()
  {
    $this->db->close();
  }


}



?>