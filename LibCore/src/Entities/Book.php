<?php

namespace App\Entities;

class Book {
    public string $title;
    public string $author;
    public  string $isbn;
    public bool $status;

    public function __construct( $var = null) {
        $this->var = $var;
    }
}