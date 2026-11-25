<?php
require 'db.php';
$stmt = $pdo->query('SELECT * FROM records ORDER BY created_at DESC');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Keepsake</title>
</head>
<body>
  <h1>Keepsake</h1>
  <p><a href="form.php">記録する</a></p>
  <?php foreach ($stmt as $row): ?>
    <h2><a href="detail.php?id=<?= (int)$row['id'] ?>"><?= htmlspecialchars($row['title']) ?></a></h2>
    <p>
      <?= htmlspecialchars($row['category']) ?>
      <?= $row['experienced_on'] ? '｜' . htmlspecialchars($row['experienced_on']) : '' ?>
      <?= $row['rating'] ? '｜' . str_repeat('★', (int)$row['rating']) . str_repeat('☆', 5 - (int)$row['rating']) : '' ?>
    </p>
  <?php endforeach; ?>
</body>
</html>