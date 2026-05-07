<?php
namespace App\Entities;

class User {

    private $name;
    private $email;

    function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function __toString() {
        return $this->name . " " . $this->email;
    }
}