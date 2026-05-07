<?php

namespace App\Entities;

class Librarian extends Users {
    public function addBook( Book $book) :void{
echo "Le livre '" . $book->getTitle() . "' a été ajouté avec succès par " . $this->getName() . ".\n";
    }
}