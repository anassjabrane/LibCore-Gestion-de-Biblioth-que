<?php

class Library {
    private $books = [];

    public function addBook($book) {
        $this->books[] = $book;
    }

    public function searchBook($keyword) {
        $result = [];

        foreach ($this->books as $book) {
            if (stripos($book->getTitle(), $keyword) !== false ||
                stripos($book->getAuthor(), $keyword) !== false) {
                $result[] = $book;
            }
        }

        return $result;
    }
    public function borrowBook($member, $book) {
        if ($book->borrow()) {
            $member->borrowBook($book);
            echo " Emprunt réussi\n";
        } else {
            echo " Livre non disponible\n";
        }
    }

    public function returnBook($member, $book) {
        $book->returnBook();
        $member->returnBook($book);
        echo " Livre retourné\n";
    }

    public function getBooks() {
        return $this->books;
    }
}