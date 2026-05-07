<?php

require_once "src/Entities/Book.php";
require_once "src/Entities/Member.php";
require_once "src/Services/Library.php";

$library = new Library();

$book1 = new Book("PHP Basics", "laila", "111");
$book2 = new Book("OOP PHP", "Sara", "222");

$library->addBook($book1);
$library->addBook($book2);

$member = new Member("Sara", "sara@gmail.com");

while (true) {

    echo "\n===== MENU MEMBER =====\n";
    echo "1. Search Book\n";
    echo "2. Borrow Book\n";
    echo "3. Return Book\n";
    echo "4. My Books\n";
    echo "0. Exit\n";

    $choice = readline("Choice: ");

    if ($choice == 1) {

        $k = readline("Keyword: ");
        $res = $library->searchBook($k);

        if (!empty($res)) {
            foreach ($res as $b) {
                echo $b->getTitle() . "\n";
            }
        } else {
            echo "No book found\n";
        }
    }

    elseif ($choice == 2) {

        $books = $library->getBooks();

        foreach ($books as $i => $b) {
            echo $i . " - " . $b->getTitle() . "\n";
        }

        $i = readline("Choisir index: ");

        if (isset($books[$i])) {
            $libraray->borrowBook($member, $books[$i]);
        } else {
            echo "Invalid choice\n";
        }
    }

    elseif ($choice == 3) {

        $myBooks = $member->getBooks();

        if (!empty($myBooks)) {

            foreach ($myBooks as $i => $b) {
                echo $i . " - " . $b->getTitle() . "\n";
            }

            $i = readline("Choisir index: ");

            if (isset($myBooks[$i])) {
                $library->returnBook($member, $myBooks[$i]);
            } else {
                echo "Invalid choice\n";
            }

        } else {
            echo "No books to return\n";
        }
    }

    elseif ($choice == 4) {

        $myBooks = $member->getBooks();

        if (empty($myBooks)) {
            echo "Aucun livre\n";
        } else {
            foreach ($myBooks as $b) {
                echo $b->getTitle() . "\n";
            }
        }
    }

    elseif ($choice == 0) {
        break;
    }

    else {
        echo "Invalid option\n";
    }
}