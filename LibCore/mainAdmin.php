<?php

require_once "src/Entities/User.php";
require_once "src/Entities/Book.php";
require_once "src/Entities/Librarian.php";
require_once "Config/database.php";
require_once "src/Services/Library.php";

use App\Entities\Book;
use App\Entities\Librarian;
use App\Services\Library;

$library1 = new Library();
$librarian = new Librarian("salah", "salahtabit12@gmail.com", $library1);

echo "Connecté en tant que: " . $librarian->getName() . "\n";

while (true) {

    echo "\n############ Welcome In our Programme ################\n";
    echo "1: Display Books\n";
    echo "2: Add Book\n";
    echo "3: Delete Book\n";
    echo "4: Add Member\n";
    echo "0: Exit\n";

    echo "Choose option: ";
    $answer = trim(fgets(STDIN));

    switch ($answer) {

        case "1":
            $librarian->displayBooks();
            break;

        case "2":
            echo "Book name: ";
            $title = trim(fgets(STDIN));

            echo "Author: ";
            $author = trim(fgets(STDIN));

            echo "ISBN: ";
            $isbn = trim(fgets(STDIN));

            echo "1 available / 0 not: ";
            $avail = (int) trim(fgets(STDIN));

            $book = new Book($title, $author, $isbn, $avail === 1);

            echo $librarian->addBook($book) . "\n";
            break;

        case "3":
            echo "ISBN to delete: ";
            $isbn = trim(fgets(STDIN));
            $librarian->deleteBook($isbn);
            break;

        case "0":
            exit;

        default:
            echo "Invalid option\n";
    }
}