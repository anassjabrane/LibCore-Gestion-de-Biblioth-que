<?php

namespace App\Entities;

abstract class Users{
    private string $name;
    private string $email;

    public function __construct(string $name , string $email) {
        $this->name = $name;
        $this->email = $email;
    }

}

