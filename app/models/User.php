<?php
// User.php
require_once 'app/core/database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }
    /**
     * This function is used to create a new user.
     * @param string $userName The username of the user.
     * @param string $password The password of the user.
     * @return int The number of rows affected.
     */

    public function create($userName, $password) {
        $sql = "INSERT INTO users (UserName, Password) VALUES (:userName, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':userName' => $userName, ':password' => $password]);
        return $this->db->lastInsertId();
    }
    // 申請の検索
    public function search($keyword) {
        $sql = "SELECT * FROM applications WHERE ApplicationNo LIKE :keyword ORDER BY ApplicationNo DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 申請の削除
    public function delete($applicationNo) {
        $sql = "DELETE FROM applications WHERE ApplicationNo = :applicationNo";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':applicationNo' => $applicationNo]);
        return $stmt->rowCount();
    }
    // 他のユーザー関連メソッド
}
