<?php

require_once "User.php";
require_once __DIR__ . "/../Services/Library.php";

use App\Entities\User;

class Librarian extends User {

    private $library;

    public function __construct($name, $email, $library) {

        parent::__construct($name, $email);

        $this->library = $library;
    }
}