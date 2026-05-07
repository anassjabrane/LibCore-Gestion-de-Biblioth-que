<?php

// 1. Importer les classes (ila ma-3ndekch autoload)
require_once 'src/Entities/Users.php';
require_once 'src/Entities/Book.php';
require_once 'src/Entities/Librarian.php';

use App\Entities\Book;
use App\Entities\Librarian;

echo "--- DEBUT DU TEST US1 ---\n";

// 2. Creé-i Librarian (L-Acteur)
$bibliothecaire = new Librarian("Anass Jabrane", "anass@email.com");

// 3. Creé-i Book (L-Objet)
$nouveauLivre = new Book("POO en PHP", "Expert Dev", "978-0123456789");

// 4. Executer l'action (Add Book)
$bibliothecaire->addBook($nouveauLivre);

echo "\n--- FIN DU TEST ---";