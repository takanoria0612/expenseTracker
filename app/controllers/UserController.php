<?php
require_once 'app/models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function create($userName, $password) {
        // ユーザー作成ロジック
        $this->userModel->create($userName, $password);
        // 作成後のリダイレクトやビューの呼び出し
    }
}
