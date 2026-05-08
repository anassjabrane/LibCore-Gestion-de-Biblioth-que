<?php
require_once __DIR__ .'/../../Config/database.php';
class Library {
    private $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }
    public function displayBooks() {
        $sql = "SELECT * FROM books";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);

        foreach ($rows as $row) {
            echo "ID: $row->id | $row->titre - $row->auteur [" . ($row->is_available ? "Dispo" : "Emprunté") . "]\n";
        }
    }
    public function addBook($book) {
        try {
            $sql = "INSERT INTO books (titre, auteur, isbn, is_available) VALUES (?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $book->getTitle(),
                $book->getAuthor(),
                $book->getIsbn(),
                $book->getAvailable()
            ]);
            return "Book added successfully";
        } catch (\PDOException $e) {
            return "Erreur: " . $e->getMessage();
        }
    }
    public function searchBook($keyword) {
        $sql = "SELECT * FROM books WHERE titre LIKE ? OR auteur LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%" . $keyword . "%";
        $stmt->execute([$searchTerm, $searchTerm]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
 public function borrowBook($membre_id, $book_id) {
    try {
        $sqlCheck = "UPDATE books SET is_available = 0 WHERE id = ? AND is_available = 1";
        $stmt = $this->conn->prepare($sqlCheck);
        $stmt->execute([$book_id]);
        if ($stmt->rowCount() > 0) {
            $sqlBorrow = "INSERT INTO borrowings (membre_id, book_id, borrowat) VALUES (?, ?, NOW())";
            $this->conn->prepare($sqlBorrow)->execute([$membre_id, $book_id]);
            return "Emprunt réussi !";
        }
        return "Livre indisponible.";
    } catch (\PDOException $e) {
        return "Erreur SQL: " . $e->getMessage();
    }
}
    public function returnBook($borrowing_id, $book_id) {
        $sqlReturn = "UPDATE borrowings SET returnat = NOW() WHERE id = ?";
        $this->conn->prepare($sqlReturn)->execute([$borrowing_id]);
        $sqlBook = "UPDATE books SET is_available = 1 WHERE id = ?";
        $this->conn->prepare($sqlBook)->execute([$book_id]);

        return "Livre retourné avec succès !";
    }
    public function getMemberBooks($member_id) {
        $sql = "SELECT b.titre, b.id as book_id, br.id as borrowing_id 
                FROM books b 
                JOIN borrowings br ON b.id = br.book_id 
                WHERE br.membre_id = ? AND br.returnat IS NULL";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$member_id]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    public function deleteBook($id) {
        $sql = "DELETE FROM books WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}