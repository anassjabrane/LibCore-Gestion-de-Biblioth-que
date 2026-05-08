<?php

namespace App\Services;


use App\Entities\Book;
use App\Entities\Borrow;
use App\Config\Database;

class Library {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function addBook($book) {
        try {
            $sql = "INSERT INTO books (titre, auteur, isbn, is_available)
                    VALUES (?,?,?,?)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $book->getTitle(),
                $book->getAuthor(),
                $book->getIsbn(),
                $book->getAvailable()
            ]);

            return "Book added successfully";

        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function displayBooks() {
        $sql = "SELECT * FROM books";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $text = "";
        foreach ($rows as $row) {
            $text .= $row->titre . "\n";
        }

        echo $text;
    }

    public function findBook($title, $auteur) {
        $sql = "SELECT * FROM books WHERE titre = ? AND auteur = ? AND is_available = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$title, $auteur]);

        $data = $stmt->fetch(\PDO::FETCH_OBJ);

        if ($data) {
            return new Book($data->titre, $data->auteur, $data->isbn, $data->is_available);
        }

        return null;
    }
}