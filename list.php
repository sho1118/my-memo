<?php
$pdo = new PDO(
  'mysql:host=localhost;dbname=keepsake;charset=utf8mb4',
  'root',
  '',
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

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
  <?php foreach ($stmt as $row): ?>
    <h2><?= htmlspecialchars($row['title']) ?></h2>
    <p><?= htmlspecialchars($row['note']) ?></p>
  <?php endforeach; ?>
</body>
</html>