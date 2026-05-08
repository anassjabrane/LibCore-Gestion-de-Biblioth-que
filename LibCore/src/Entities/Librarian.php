<?php 
namespace App\Entities;


use App\Services\Library;

class Librarian extends User {

    private $library;

    public function __construct($name,$email,Library $library){
        parent::__construct($name,$email);
        $this->library = $library;
    }

    public function addBook($book){
        return $this->library->addBook($book);
    }

    public function displayBooks(){
        return $this->library->displayBooks();
    }

    public function deleteBook($isbn){
        return $this->library->deleteBook($isbn);
    }
}