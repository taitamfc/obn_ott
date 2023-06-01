<?php

namespace Manager;

    class Employee {
      private $id;
      private $firstName;
      private $lastName;
      private $dateOfBirth;
      private $address;
      private $position;

      public function __construct($id,$firstName, $lastName, $dateOfBirth, $address, $position) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->address = $address;
        $this->position = $position;
      }
      
      public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }


      public function getFirstName() {
        return $this->firstName;
      }

      public function setFirstName($firstName) {
        $this->firstName = $firstName;
      }

      public function getLastName() {
        return $this->lastName;
      }

      public function setLastName($lastName) {
        $this->lastName = $lastName;
      }

      public function getDateOfBirth() {
        return $this->dateOfBirth;
      }

      public function setDateOfBirth($dateOfBirth) {
        $this->dateOfBirth = $dateOfBirth;
      }

      public function getAddress() {
        return $this->address;
      }

      public function setAddress($address) {
        $this->address = $address;
      }

      public function getPosition() {
        return $this->position;
      }

      public function setPosition($position) {
        $this->position = $position;
      }

      public function displayInfo() {
        echo "Employee Info:\n";
        echo "Name: " . $this->firstName . " " . $this->lastName . "\n";
        echo "Date of birth: " . $this->dateOfBirth . "\n";
        echo "Address: " . $this->address . "\n";
        echo "Position: " . $this->position . "\n";
      }
    }