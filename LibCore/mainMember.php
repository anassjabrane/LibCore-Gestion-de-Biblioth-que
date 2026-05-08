<?php
require_once "src/Entities/Book.php";
require_once "src/Entities/Member.php";
require_once "src/Services/Library.php";
$library = new Library();
$current_member_id = 1; 
while (true) {
    echo "\n========== MENU BIBLIOTHÈQUE ==========\n";
    echo "1. Rechercher un livre\n";
    echo "2. Emprunter un livre\n";
    echo "3. Retourner un livre\n";
    echo "4. Mes emprunts (My Books)\n";
    echo "0. Quitter\n";
    echo "=======================================\n";
    $choice = readline("Votre choix: ");
    if ($choice == "1") {
        $k = readline("Entrez un titre ou auteur: ");
        $results = $library->searchBook($k);
        if (empty($results)) {
            echo "Aucun livre trouvé.\n";
        } else {
            foreach ($results as $b) {
                $status = $b->is_available ? "[Disponible]" : "[Emprunté]";
                echo "ID: $b->id | $b->titre - $b->auteur $status\n";
            }
        }
    }
    elseif ($choice == "2") {
        echo "Livres disponibles :\n";
        $books = $library->searchBook("");
        $available_books = [];
        foreach ($books as $b) {
            if ($b->is_available) {
                echo "ID: $b->id - $b->titre\n";
                $available_books[] = $b->id;
            }
        }
        $id_to_borrow = readline("Entrez l'ID du livre à emprunter: ");
        if (in_array($id_to_borrow, $available_books)) {
            echo $library->borrowBook($current_member_id, $id_to_borrow) . "\n";
        } else {
            echo "ID invalide ou livre indisponible.\n";
        }
    }
    elseif ($choice == "3") {
        $myBooks = $library->getMemberBooks($current_member_id);
        if (empty($myBooks)) {
            echo "Vous n'avez aucun livre à retourner.\n";
        } else {
            foreach ($myBooks as $i => $b) {
                echo "$i - $b->titre (ID: $b->book_id)\n";
            }
            $idx = readline("Choisissez l'index du livre à retourner: ");
            if (isset($myBooks[$idx])) {
                echo $library->returnBook($myBooks[$idx]->borrowing_id, $myBooks[$idx]->book_id) . "\n";
            } else {
                echo "Choix invalide.\n";
            }
        }
    }
    elseif ($choice == "4") {
        $myBooks = $library->getMemberBooks($current_member_id);
        echo "\n--- Liste de vos emprunts ---\n";
        if (empty($myBooks)) {
            echo "Vous n'avez aucun livre en ce moment.\n";
        } else {
            foreach ($myBooks as $b) {
                echo "• $b->titre\n";
            }
        }
    }
    elseif ($choice == "0") {
        echo "Au revoir !\n";
        break;
    }
}