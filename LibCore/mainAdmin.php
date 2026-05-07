<?php

require_once "src/Entities/book.php";
require_once "src/Entities/librarian.php";
require_once "src/Entities/user.php";
require_once "src/Services/Library.php";

use App\Entities\Book;
use App\Entities\Librarian;
use App\Services\Library;

$library1 = new Library();
$librarian = new Librarian("salah", "salahtabit12@gmail.com", $library1);

// Mat-dirch echo $librarian nichan
echo "Connecté en tant que: " . $librarian->getName() . "\n";

while (true) {
    echo "\n############ Welcome In our Programme ################\n";
    echo "1: Display Books\n";
    echo "2: Add Book\n";
    echo "3: Delete Book\n";
    echo "4: Add Member\n";
    echo "0: Exit\n";

    $answer = readline("Choose option: ");

    switch ($answer) {
        case "1":
            $librarian->displayBooks();
            break;

        case "2":
            $nameB = readline("Write the name of the book: ");
            $nameA = readline("Write the name of author: ");
            $isbn  = readline("Write the ISBN of the book: ");
            $avai  = (int) readline("1 if available, 0 if not: ");

            $book = new Book($nameB, $nameA, $isbn, $avai === 1);
            $librarian->addBook($book);
            break;

        case "3":
            $isbn = readline("Write ISBN of the book to delete: ");
            $librarian->deleteBook($isbn);
            break;

        case "4":
            echo "Feature Member bientôt disponible...\n";
            break;

        case "0":
            echo "See you later!\n";
            exit;

        default:
            echo "Invalid option, try again.\n";
    }
}