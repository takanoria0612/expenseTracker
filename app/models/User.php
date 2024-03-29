<?php
// User.php
require_once 'app/core/database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function create($userName, $password) {
        $sql = "INSERT INTO users (UserName, Password) VALUES (:userName, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':userName' => $userName, ':password' => $password]);
        return $this->db->lastInsertId();
    }

    // 他のユーザー関連メソッド
}
