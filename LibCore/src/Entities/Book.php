<?php
namespace App\Entities;

class Book {
    public $title;
    public $author;
    public $isbn;
    public $isAvailable;

    public function __construct($title,$author,$isbn,$isAvailable){
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->isAvailable = $isAvailable;
    }

    public function getTitle(){ return $this->title; }
    public function getAuthor(){ return $this->author; }
    public function getIsbn(){ return $this->isbn; }
    public function getAvailable(){ return $this->isAvailable; }
}