<?php
class Book{
    public $title;
    public $auteur;
    public $isbn;
    public $isAvialable;
    
    public function __construct( $title ,$auteur ,$isbn , $isAvialable) {
        $this->title = $title;
        $this->auteur = $auteur;
        $this->isbn = $isbn;
        $this->isAvialable = $isAvialable;
        
    }
    
    
    }