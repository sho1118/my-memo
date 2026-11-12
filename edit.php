<?php
require 'db.php';

$id = $_GET['id'] ?? '';
$stmt = $pdo->prepare('SELECT * FROM records WHERE id = ?');
$stmt->execute([$id]);
$row = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Keepsake - 編集</title>
</head>
<body>
  <?php if ($row): ?>
    <h1>編集する</h1>
    <form action="update.php" method="post">
      <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
      <p>タイトル<br>
        <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required>
      </p>
      <p>感想<br>
        <textarea name="note" rows="6" cols="40" required><?= htmlspecialchars($row['note']) ?></textarea>
      </p>
      <button type="submit">更新</button>
    </form>
    <p><a href="detail.php?id=<?= (int)$row['id'] ?>">詳細に戻る</a></p>
  <?php else: ?>
    <p>記録が見つかりませんでした。</p>
    <p><a href="list.php">一覧に戻る</a></p>
  <?php endif; ?>
</body>
</html>