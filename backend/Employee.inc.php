<?php
require_once 'LlticDbConnection.inc.php';
class Employee
{
  $id;
  $firstName;
  $lastName;
  $email;
  $hireDate;
  $salary;
  $phone;
  $userID;
  $init;

  public function __construct()
  {
    $this->init = False;
  }
  public function set(array $row)
  {
    $this->id = $row['id'];
    $this->firstName = $row['firstName'];
    $this->lastName = $row['lastName'];
    $this->email = $row['email'];
    $this->hireDate = $row['hireDate'];
    $this->salary = $row['salary'];
    $this->phone = $row['phone'];
    $this->userID = $row['userID'];
    $this->init = True;
  }

  public function printRecord()
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
