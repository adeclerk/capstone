<?php
require_once ('class.LlticDbConnection.php');

class Session
{
  private $dbcon = NULL;
  private $isAlive = true;
  private $sessID;
  
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
    $this->sessID = session_id();
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
    $this->dbcon = new LlticDbConnection();
    $this->isAlive = true;
  }

  private function close()
  {
    $this->dbcon->close();
    $this->isAlive = false;
  }

  private function read($sessionID)
  {
    $sqlQuery = "SELECT * FROM `sessions` WHERE `id`='" . $sessionID ."'";
    print "<br /> SEARCHING ON " . $sessionID . "<br/>";

    $result = $this->dbcon->qry($sqlQuery);
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
    $sqlQuery = "REPLACE INTO `sessions` (`id`,`data`) VALUES('" . $sessionID . "','" . $data . "')";
    $this->dbcon->qry($sqlQuery);

    return $this->dbcon->getConnection()->affected_rows;
  }

  private function destroy($sessionID)
  {
    $sqlQuery = "DELETE FROM `sessions` WHERE `id`='" . $sessionID . "'";
    $this->dbcon->qry($sqlQuery);

    $_SESSION = array();
    return $this->dbcon->getConnection()->affected_rows;
  }

  private function clean()
  {
  //	$expire = time() - 86400;
    //   $sqlQuery = "DELETE FROM `sessions` WHERE DATE_ADD(`last_accessed`, INTERVAL ".(int) $expire." SECOND) < NOW()"; 
    //$this->dbcon->getConnection()->query($sqlQuery);
    //return $this->dbcon->getConnection()->affected_rows;
  }
  
  public function setVar($name, $value)
  {
  	$_SESSION[$name] = $value;
  }
  
  public function removeVar($name)
  {
  	unset($_SESSION[$name]);
  }
  
  public function getVar($name)
  {
  	return $_SESSION[$name];
  }
  
  public function getId()
  {
  	return $this->sessID;
  }
}

?>
