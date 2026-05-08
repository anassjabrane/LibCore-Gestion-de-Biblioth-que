<?php

class Book {
    private $title;
    private $author;
    private $isbn;
    private $isAvailable = true;

    public function __construct($title, $author, $isbn) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function isAvailable() {
        return $this->isAvailable;
    }

    public function getStatus() {
        return $this->isAvailable ? "Disponible" : "Emprunté";
    }

    public function borrow() {
        if (!$this->isAvailable) return false;
        $this->isAvailable = false;
        return true;
    }

    public function returnBook() {
        $this->isAvailable = true;
    }
}