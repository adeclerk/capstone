<?php
require_once ('classes/class.LlticDbConnection.php');
class Employee
{
  public $id;
  public $firstName;
  public $lastName;
  public $hireDate;
  public $salary;
  public $phone;
  public $userID;
  public $init;

  public function __construct($id = NULL,$firstName = NULL,
  								$lastName = NULL,$hireDate = NULL,$salary = NULL,
  								$phone = NULL,$userId = NULL)
  {
  	if($id == NULL)
  	{
    	$this->init = False;
  	}
  	else
  	{
  		$this->id = $id;
  		$this->firstName = $firstName;
  		$this->lastName = $lastName;
  		$this->hireDate = $hireDate;
  		$this->salary = $salary;
  		$this->phone = $phone;
  		$this->userID = $userId;
  		$this->init = True;
  	}
  }
  public function set(array $row)
  {
    $this->id = $row['id'];
    $this->firstName = $row['firstName'];
    $this->lastName = $row['lastName'];
    $this->hireDate = $row['hireDate'];
    $this->salary = $row['salary'];
    $this->phone = $row['phone'];
    $this->userID = $row['userID'];
    $this->init = True;
  }

  public function __toString()
  {
    print "<tr><td>"
      		.$this->id . "</td><td>"
            . $this->firstName . "</td><td>"
            . $this->lastName . "</td><td>"
            . $this->hireDate . "</td><td>"
            . $this->salary . "</td><td>"
            . $this->phone . "</td><td></tr>"
            . $this->userID . "</td><td>";
  }
}
?>
