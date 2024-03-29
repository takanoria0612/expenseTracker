<!-- login.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン - 旅費交通費申請アプリ</title>
    <link rel="stylesheet" href="style.css"> <!-- スタイルシートのパスは適宜調整してください -->
</head>
<body>
    <div class="login-container">
        <h1>ログイン</h1>
        <form action="/path/to/login" method="post"> <!-- ログイン処理のパスは適宜調整してください -->
            <div class="form-group">
                <label for="username">ユーザー名:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">パスワード:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">ログイン</button>
        </form>
    </div>
</body>
</html>
