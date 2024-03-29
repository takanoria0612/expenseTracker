<?php
// Application.php
require_once 'app/core/database.php';

class Application {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // applicationNoの生成と新規申請の追加
    public function createWithNewApplicationNo($userID) {
        $applicationNo = $this->generateNewApplicationNo();
        $sql = "INSERT INTO applications (ApplicationNo, UserID) VALUES (:applicationNo, :userID)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':applicationNo' => $applicationNo, ':userID' => $userID]);
        return $stmt->rowCount();
    }

    // applicationNoの生成ロジック
    private function generateNewApplicationNo() {
        $datePart = date('ymd'); // 年の右2桁と月日
        $latestApplicationNo = $this->getLatestApplicationNoForToday();
        
        if ($latestApplicationNo) {
            $currentNumber = substr($latestApplicationNo, 6, 2); // 既存の最後の連番を取得
            $newNumber = sprintf('%02d', $currentNumber + 1); // 連番を1増やす
        } else {
            $newNumber = '01'; // 今日の最初の申請番号
        }

        return $datePart . $newNumber; // 新しいapplicationNoを生成
    }

    // その日の最新のapplicationNoを取得
    private function getLatestApplicationNoForToday() {
        $datePart = date('ymd');
        $sql = "SELECT ApplicationNo FROM applications WHERE ApplicationNo LIKE :datePart ORDER BY ApplicationNo DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':datePart' => $datePart . '%']);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result ? $result['ApplicationNo'] : null;
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
    // その他のメソッド...
}

