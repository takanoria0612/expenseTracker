<?php
require_once 'app/models/ApplicationDetail.php';

class ApplicationDetailController {
    private $applicationDetailModel;

    public function __construct() {
        $this->applicationDetailModel = new ApplicationDetail();
    }

    public function searchByApplicationNo($applicationNo) {
        // 申請詳細の検索ロジック
        $details = $this->applicationDetailModel->searchByApplicationNo($applicationNo);
        // 検索結果をビューに渡す
    }

    public function deleteDetail($detailID) {
        // 申請詳細の削除ロジック
        $this->applicationDetailModel->delete($detailID);
        // 削除後のリダイレクトやビューの呼び出し
    }
}
