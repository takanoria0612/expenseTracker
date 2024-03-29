<!-- views/application/dashboard.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ダッシュボード - 旅費交通費申請アプリ</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>ダッシュボード</h1>
        <a href="new.php" class="new-application-button">新規作成</a>
        <div class="applications-list">
            <?php foreach ($applications as $application): ?>
                <div class="application-item">
                    <span class="application-no"><?= htmlspecialchars($application['ApplicationNo']) ?></span>
                    <a href="/application/edit?no=<?= urlencode($application['ApplicationNo']) ?>" class="edit-button">編集</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
