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
  <p><a href="list.php">一覧に戻る</a></p>
</body>
</html>