<?php
    class Contact
    {
      private $name;
      private $number;
      private $address;

      //Constructor
      function __construct($name, $number, $address)
      {
        $this->name = $name;
        $this->number = $number;
        $this->address = $address;
      }

      //Setters
      function setName($new_name)
      {
        $this->name = (string) $new_name;
      }

      function setNumber($new_number)
      {
        $this->number = (float) $new_number;
      }

      function setAddress($new_address)
      {
        $this->number = (string) $new_address;
      }

      //Getters
      function getName()
      {
        return $this->name;
      }

      function getNumber()
      {
        return $this->number;
      }

      function getAddress()
      {
        return $this->address;
      }

      //Save Method
      function save()
      {
        array_push($_SESSION['list_of_contacts'], $this);
      }

      //Static - GetAll Method
      static function getAll()
      {
        return $_SESSION['list_of_contacts'];
      }

      //Static - DeleteAll Method
      static function deleteAll()
      {
        $_SESSION['list_of_contacts'] = array();
      }

    }

?>
