<?php

require_once "src/Entities/book.php";
require_once "src/Entities/librarian.php";
require_once "src/Entities/user.php";
require_once "src/Services/Library.php";


$library1 = new Library();
$librarian = new Librarian("salah", "salahtabit12@gmail.com", $library1);

echo $librarian;

while (true) {

    echo "############ Welcome In our Programme ################\n";
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
            echo "Write the name of the book:\n";
            $nameB = readline();

            echo "Write the name of author:\n";
            $nameA = readline();

            echo "Write the ISBN of the book:\n";
            $isbn = readline();

            echo "1 if available, 0 if not:\n";
            $avai = (int) readline();

            $book = new Book($nameB, $nameA, $isbn, $avai === 1);
            $librarian->addBook($book);

            break;

        case "3":
            echo "Write ISBN of the book:\n";
            $isbn = readline();
            $librarian->deleteBook($isbn);
            break;

        case "4":
            echo "Add member feature (not implemented yet)\n";
            break;

        case "0":
            echo "See you later\n";
            exit;

        default:
            echo "Invalid option\n";
    }
}