<?php
namespace LibCore\Entities; 

class Borrow {
    private $member;
    private $book;
    private $borrowDate;
    private $returnDate; 
     public function __construct($member, $book, $borrowDate, $returnDate = null) {
        $this->member = $member;
        $this->book = $book;
        $this->borrowDate = $borrowDate;
        $this->returnDate = $returnDate;
    }
    }