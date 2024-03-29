<!-- views/application/edit.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>申請編集 - 旅費交通費申請アプリ</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="edit-application-container">
        <h1>申請編集</h1>
        <form action="/application/update" method="post">
            <input type="hidden" name="applicationNo" value="<?= htmlspecialchars($application['ApplicationNo']) ?>">

            <div class="form-group">
                <label for="purpose">申請目的:</label>
                <select id="purpose" name="purpose">
                    <option value="交通費精算" <?= $application['Purpose'] == '交通費精算' ? 'selected' : '' ?>>交通費精算</option>
                    <option value="出張旅費精算" <?= $application['Purpose'] == '出張旅費精算' ? 'selected' : '' ?>>出張旅費精算</option>
                    <option value="定期代精算" <?= $application['Purpose'] == '定期代精算' ? 'selected' : '' ?>>定期代精算</option>
                    <option value="その他" <?= $application['Purpose'] == 'その他' ? 'selected' : '' ?>>その他</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date">日付:</label>
                <input type="date" id="date" name="date" value="<?= htmlspecialchars($application['Date']) ?>" required>
            </div>

            <div class="form-group">
                <label for="routeName">路線名:</label>
                <input type="text" id="routeName" name="routeName" value="<?= htmlspecialchars($application['RouteName']) ?>" required>
            </div>

            <div class="form-group">
                <label for="departureStation">出発駅:</label>
                <input type="text" id="departureStation" name="departureStation" value="<?= htmlspecialchars($application['DepartureStation']) ?>" required>
            </div>

            <div class="form-group">
                <label for="arrivalStation">到着駅:</label>
                <input type="text" id="arrivalStation" name="arrivalStation" value="<?= htmlspecialchars($application['ArrivalStation']) ?>" required>
            </div>

            <div class="form-group">
                <label for="amount">金額:</label>
                <input type="number" id="amount" name="amount" value="<?= htmlspecialchars($application['Amount']) ?>" required>
            </div>

            <div class="form-group">
                <label for="remarks">備考:</label>
                <textarea id="remarks" name="remarks"><?= htmlspecialchars($application['Remarks']) ?></textarea>
            </div>

            <button type="submit" class="submit-button">更新</button>
        </form>
    </div>
</body>
</html>
