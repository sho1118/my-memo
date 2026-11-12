<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'] ?? '';
  $stmt = $pdo->prepare('DELETE FROM records WHERE id = ?');
  $stmt->execute([$id]);
}

header('Location: list.php');
exit;