<?php

namespace App\Models;

use App\Models\Model;

class User extends Model {

    protected $id;
    protected $email;
    protected $firstName;
    protected $lastName;
    protected $password;
    protected $createdOn;
    protected $updatedOn;

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCreatedOn() {
        return $this->createdOn;
    }

    public function getUpdatedOn() {
        return $this->updatedOn;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setCreatedOn($createdOn) {
        $this->createdOn = $createdOn;
    }

    public function setUpdatedOn($updatedOn) {
        $this->updatedOn = $updatedOn;
    }

}
