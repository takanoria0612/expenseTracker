<?php

class HomeController {
    public function show() {
        $message = "Hello, World!";
        require_once '../views/home.php';
    }
}
