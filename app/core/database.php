<!-- app/core/database.php -->

<?php

$dbConfig = require '../../config/database.php';

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        global $dbConfig;
        $dsn = $dbConfig['dsn']; // Separated DSN from config
        try {
            $this->connection = new PDO($dsn, $dbConfig['user'], $dbConfig['password']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("DB Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->connection;
    }
}

// Databaseのインスタンスが作れたら成功したとechoする
try {
    $dbInstance = Database::getInstance();
    echo "Database connection successful.";
} catch (Exception $e) {
    echo "Failed to create a Database instance: " . $e->getMessage();
}
