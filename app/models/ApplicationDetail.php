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

    // 申請詳細に関する他のメソッド
}
