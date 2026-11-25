<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Keepsake - 記録する</title>
</head>
<body>
  <h1>記録する</h1>
  <form action="save.php" method="post">
    <p>タイトル<br><input type="text" name="title" required></p>
    <p>種類<br>
      <select name="category">
        <?php foreach ($categories as $c): ?>
          <option value="<?= htmlspecialchars($c) ?>"><?= htmlspecialchars($c) ?></option>
        <?php endforeach; ?>
      </select>
    </p>
    <p>体験した日<br><input type="date" name="experienced_on"></p>
    <p>評価<br>
      <select name="rating">
        <option value="">未評価</option>
        <?php for ($i = 5; $i >= 1; $i--): ?>
          <option value="<?= $i ?>"><?= str_repeat('★', $i) ?></option>
        <?php endfor; ?>
      </select>
    </p>
    <p>感想<br><textarea name="note" rows="6" cols="40" required></textarea></p>
    <button type="submit">保存</button>
  </form>
  <p><a href="list.php">一覧に戻る</a></p>
</body>
</html>