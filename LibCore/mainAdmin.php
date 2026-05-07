<?php

require_once "src/Services/Database.php";

$pdo = Database::connect();

echo "Connexion OK ✅";


// test us1
require_once 'src/Entities/User.php';
require_once 'src/Entities/Book.php';
require_once 'src/Entities/Librarian.php';

use App\Entities\Book;
use App\Entities\Librarian;

$admin = new Librarian("Anass Jabrane", "anass@email.com");
$book = new Book("POO PHP", "Anass", "123-456");

$admin->addBook($book);