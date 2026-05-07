<?php

namespace App\Entities;

class Librarian extends Users {
    public function addBook( Book $book) :void{
        echo "✅ [US1] Le livre '" . $book->getTitle() . "' a été ajouté par " . $this->getName();

    }
}