<?php

namespace App\Entities;

abstract class Users{
    private string $name;
    private string $email;

    public function __construct(string $name , string $email) {
        $this->name = $name;
        $this->email = $email;
    }
    // 3. Les Getters (Bach n-qraw l-m3loumat)
    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    

}

