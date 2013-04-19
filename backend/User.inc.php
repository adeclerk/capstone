<?php

  class User
  {
    private $id;
    private $username;
    private $isSet = false;

    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function set($id, $username)
    {
      $this->id = $id;
      $this->username = $username;
      $isSet = true;
    }

    public function isSet()
    {
      return $isSet;
    }
?>
