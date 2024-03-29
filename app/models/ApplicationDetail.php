<?php
// ApplicationDetail.php
require_once 'app/core/database.php';

class ApplicationDetail {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function create($applicationNo, $purpose, $date, $routeName, $departureStation, $arrivalStation, $amount, $remarks) {
        $sql = "INSERT INTO application_details (ApplicationNo, Purpose, Date, RouteName, DepartureStation, ArrivalStation, Amount, Remarks) VALUES (:applicationNo, :purpose, :date, :routeName, :departureStation, :arrivalStation, :amount, :remarks)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':applicationNo' => $applicationNo,
            ':purpose' => $purpose,
            ':date' => $date,
            ':routeName' => $routeName,
            ':departureStation' => $departureStation,
            ':arrivalStation' => $arrivalStation,
            ':amount' => $amount,
            ':remarks' => $remarks
        ]);
        return $stmt->rowCount();
    }

    
    // 申請詳細の検索（applicationNoに基づく）
    public function searchByApplicationNo($applicationNo) {
        $sql = "SELECT * FROM application_details WHERE ApplicationNo = :applicationNo";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':applicationNo' => $applicationNo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 申請詳細の削除
    public function delete($detailID) {
        $sql = "DELETE FROM application_details WHERE DetailID = :detailID";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':detailID' => $detailID]);
        return $stmt->rowCount();
    }
    
    
    // 申請詳細に関する他のメソッド
}
