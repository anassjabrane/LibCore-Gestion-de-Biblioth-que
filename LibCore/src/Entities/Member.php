<?php

// require_once "User.php";
// require_once "Book.php";

class Member extends User {
    private $borrowedBooks = [];

    public function borrowBook($book) {
        if ($book->borrow()) {
            $this->borrowedBooks[] = $book;
            echo "Livre emprunté\n";
        } else {
            echo "Livre déjà emprunté\n";
        }
    }

    public function returnBook($book) {
        foreach ($this->borrowedBooks as $k => $b) {
            if ($b === $book) {
                unset($this->borrowedBooks[$k]);
                $book->returnBook();
                echo "Livre retourné\n";
                return;
            }
        }
        echo "Vous n'avez pas ce livre\n";
    }

    public function showBooks() {
        echo "Mes livres:\n";

        if (empty($this->borrowedBooks)) {
            echo "Aucun livre\n";
            return;
        }

        foreach ($this->borrowedBooks as $book) {
            echo "- " . $book->getTitle() . "\n";
        }
    }
    public function getBooks() {
    return $this->borrowedBooks;
}
}