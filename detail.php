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
  <title>Keepsake - 詳細</title>
</head>
<body>
  <?php if ($row): ?>
    <h1><?= htmlspecialchars($row['title']) ?></h1>
    <p><?= nl2br(htmlspecialchars($row['note'])) ?></p>
    <p><small>記録した日時：<?= htmlspecialchars($row['created_at']) ?></small></p>
  <?php else: ?>
    <p>記録が見つかりませんでした。</p>
  <?php endif; ?>
  <?php if ($row): ?>
    <p><a href="edit.php?id=<?= (int)$row['id'] ?>">編集する</a></p>
  <form action="delete.php" method="post" onsubmit="return confirm('この記録を削除しますか？');">
    <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
    <button type="submit">削除</button>
  </form>
<?php endif; ?>
  <p><a href="list.php">一覧に戻る</a></p>
</body>
</html>