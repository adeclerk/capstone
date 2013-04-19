<?php

class Employee
{
  private $id;
  private $firstName;
  private $lastName;
  private $email;
  private $password;
  private $hireDate;
  private $salary;
  private $isAdmin;
  private $username;
  private $phone;
  private $init;

  public function __construct()
  {
    $this->init = False;
  }
  public function set(array $row)
  {
    $this->id = $row[0];
    $this->firstName = $row[1];
    $this->lastName = $row[2];
    $this->email = $row[3];
    $this->password = $row[4];
    $this->hireDate = $row[5];
    $this->salary = $row[6];
    $this->isAdmin = $row[7];
    $this->username = $row[8];
    $this->phone = $row[9];
    $this->init = True;
  }

  public function getId()
  {
    if($this->init == True)
      return $this->id;
    else
      return -1;
  }

  public function getFirstName()
  {
    return $this->firstName;
  }
  
  public function getLastName()
  {
    return $this->lastName;
  }
  
  public function getEmail()
  {
    return $this->email;
  }
  
  public function getHireDate()
  {
    return $this->hireDate;
  }
  
  public function getSalary()
  {
   return $this->salary; 
  }
  
  public function isAdmin()
  {
    return $this->isAdmin;
  }
  
  public function getUsername()
  {
    if($this->init == True)
      return $this->username;
    else
      return -1;
  }
  
  public function getPhone()
  {
    return $this->phone;
  }

  public function getPassword()
  {
    if($this->init == True)
      return $this->password;
    else
      return NULL;
  }

  public function init()
  {
    return $this->init;
  }
  
  public function print()
  {
    print "<tr><td>"
            .$this->id . "</td><td>"
            . $this->firstName . "</td><td>"
            . $this->lastName . "</td><td>"
            . $this->email . "</td><td>"
            . $this->hireDate . "</td><td>"
            . $this->salary . "</td><td>"
            . $this->isAdmin . "</td><td>"
            . $this->username . "</td><td>"
            . $this->phone . "</td><td></tr>";
  }
}

?>
