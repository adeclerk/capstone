<?php
require_once 'LlticDbConnection.inc.php';

class Session
{
  private $dbcon;
  private $isAlive = true;
  
  public function __construct()
  {
    session_set_save_handler(
      array(&$this, 'open'),
      array(&$this, 'close'),
      array(&$this, 'read'),
      array(&$this, 'write'),
      array(&$this, 'destroy'),
      array(&$this, 'clean'));
 
    session_start();
  }

  public function __destruct()
  {
    if($this->isAlive)
    {
      session_write_close();
      $this->isAlive = false;
    }
  }
  
  public function delete()
  {
    if(ini_get('session.use_cookies'))
    {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
        $params['path'], $params['domain'],
        $params['secure'], $params['httponly']
      );
    }
 
    session_destroy();
 
    $this->alive = false;
  }
 
  private function open()
  {
    $this->dbcon = new LlticDbConnection;
  }

  private function close()
  {
    $this->dbcon->__destruct();
    $this->isAlive = false;
  }

  private function read($sessionID)
  {
    $sqlQuery = "SELECT `data` FROM `sessions` WHERE id=`" .$this->dbcon->getConnection()->real_escape_string($sessionID) ."' LIMIT 1";

    $result = $this->dbcon->query($sqlQuery);
    if($result->num_rows == 1)
      {
	$fields = $result->fetch_assoc();
	return $fields['data'];
      }
    else
      {
	return '';
      }
  }

  private function write($sessionID, $data)
  {
    $sqlQuery = "REPLACE INTO `sessions` (`id`,`data`) VALUES('" . $this->dbcon->getConnection()->real_escape_string($sessionID) . "," . $this->dbcon->getConnection()->real_escape_string($data) . "')";
    $this->dbcon->getConnection()->query($sqlQuery);

    return $this->dbcon->getConnection()->affected_rows;
  }

  private function destroy($sessionID)
  {
    $sqlQuery = "DELETE FROM `sessions` WHERE `id`= '" . $this->dbcon->getConnection->real_escape_string($sessionID) . "'";
    $this->dbcon->getConnection()->query($sqlQuery);

    $_SESSION = array();
    return $this->dbcon->getConnection()->affected_rows;
  }

  private function clean()
  {
    //   $sqlQuery = "DELETE FROM `sessions` WHERE DATE_ADD(`last_accessed`, INTERVAL ".(int) $expire." SECOND) < NOW()"; 
    //$this->dbcon->getConnection()->query($sqlQuery);
    //return $this->dbcon->getConnection()->affected_rows;
  }
}

?>
