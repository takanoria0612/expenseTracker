<!-- views/application/new.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規申請作成 - 旅費交通費申請アプリ</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="new-application-container">
        <h1>新規申請作成</h1>
        <form action="create.php" method="post">
            <div class="form-group">
                <label for="purpose">申請目的:</label>
                <select id="purpose" name="purpose">
                    <option value="交通費精算">交通費精算</option>
                    <option value="出張旅費精算">出張旅費精算</option>
                    <option value="定期代精算">定期代精算</option>
                    <option value="その他">その他</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date">日付:</label>
                <input type="date" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label for="routeName">路線名:</label>
                <input type="text" id="routeName" name="routeName" required>
            </div>

            <div class="form-group">
                <label for="departureStation">出発駅:</label>
                <input type="text" id="departureStation" name="departureStation" required>
            </div>

            <div class="form-group">
                <label for="arrivalStation">到着駅:</label>
                <input type="text" id="arrivalStation" name="arrivalStation" required>
            </div>

            <div class="form-group">
                <label for="amount">金額:</label>
                <input type="number" id="amount" name="amount" required>
            </div>

            <div class="form-group">
                <label for="remarks">備考:</label>
                <textarea id="remarks" name="remarks"></textarea>
            </div>

            <button type="submit" class="submit-button">申請作成</button>
        </form>
    </div>
</body>
</html>
