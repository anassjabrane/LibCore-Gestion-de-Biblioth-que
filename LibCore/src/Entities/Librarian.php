<<?php

require_once "User.php";

class Librarian extends User {

    public function addBook($library, $book) {
        $library->addBook($book);
    }
}