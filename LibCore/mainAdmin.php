<?php

require_once "src/Services/Database.php";

$pdo = Database::connect();

echo "Connexion OK ✅";