<?php
$pdo = new PDO(
  'mysql:host=localhost;dbname=keepsake;charset=utf8mb4',
  'root',
  '',
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
$categories = ['映画', '本', '展覧会', '旅行', 'その他'];