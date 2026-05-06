<?php

class Database {
    private static $pdo = null;

    public static function connect() {

        if (self::$pdo === null) {

            // قراءة .env
            $env = parse_ini_file(__DIR__ . '/../../.env');

            $host = $env['DB_HOST'];
            $dbname = $env['DB_NAME'];
            $user = $env['DB_USER'];
            $pass = $env['DB_PASS'];

            try {
                self::$pdo = new PDO(
                    "mysql:host=$host;dbname=$dbname",
                    $user,
                    $pass
                );

                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                die("Erreur DB: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}