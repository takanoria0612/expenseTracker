<?php

require_once __DIR__ . '/../routes/web.php';

// ドキュメントルートからのリクエストURIを取得し、クエリ文字列を除去
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// プロジェクトのサブディレクトリを考慮（もしappディレクトリがサブディレクトリにある場合）
// この例ではサブディレクトリを考慮していませんが、実際の環境に合わせて調整が必要かもしれません
$base = str_replace('/phpusdproject2/app/public', '', $request);
var_dump($base, $routes);
if (array_key_exists($base, $routes)) {
    [$controller, $method] = explode('@', $routes[$base]);
    var_dump(__DIR__);
    require_once __DIR__ . '/../app/controllers/' . $controller . '.php';
   
    $controller = new $controller();
    $controller->$method();
     // Moved here as per instructions
} else {
    header("HTTP/1.0 404 Not Found");
    echo "Page not found.";
}


// require_once '../routes/web.php';

// // シンプルなルーティング
// $request = $_SERVER['REQUEST_URI'];
// $base = str_replace('/public', '', $request); // 本番環境ではこの処理を調整する必要があるかもしれません

// if (array_key_exists($base, $routes)) {
//     [$controller, $method] = explode('@', $routes[$base]);
//     require_once __DIR__ . '/../controllers/' . $controller . '.php';
//     $controller = new $controller();
//     $controller->$method();
// } else {
//     header("HTTP/1.0 404 Not Found");
//     echo "Page not found.";
// }
