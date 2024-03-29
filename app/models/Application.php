<?php
// Application.php
require_once 'app/core/database.php';

class Application {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function create($applicationNo, $userID) {
        $sql = "INSERT INTO applications (ApplicationNo, UserID) VALUES (:applicationNo, :userID)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':applicationNo' => $applicationNo, ':userID' => $userID]);
        return $stmt->rowCount();
    }

    // 申請に関する他のメソッド
}
