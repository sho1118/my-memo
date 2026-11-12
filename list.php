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
    <h2><?= htmlspecialchars($row['title']) ?></h2>
    <p><?= htmlspecialchars($row['note']) ?></p>
  <?php endforeach; ?>
</body>
</html>