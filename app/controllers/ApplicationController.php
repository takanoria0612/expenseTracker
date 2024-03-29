<!-- controllers/ApplicationController.php -->
<?php
require_once 'app/models/Application.php';
require_once 'app/models/ApplicationDetail.php';

class ApplicationController {
    private $applicationModel;
    private $applicationDetailModel;

    public function __construct() {
        $this->applicationModel = new Application();
        $this->applicationDetailModel = new ApplicationDetail();
    }

    public function createWithNewApplicationNo($userID) {
        // 新しい申請の作成ロジック
        $this->applicationModel->createWithNewApplicationNo($userID);
        // リダイレクトやビューの呼び出し
    }

    public function searchApplications($keyword) {
        // 申請の検索ロジック
        $results = $this->applicationModel->search($keyword);
        // 検索結果をビューに渡す
    }

    public function deleteApplication($applicationNo) {
        // 申請の削除ロジック
        $this->applicationModel->delete($applicationNo);
        // 削除後のリダイレクトやビューの呼び出し
    }
}
