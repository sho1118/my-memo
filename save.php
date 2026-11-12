<?php
require 'db.php';

$title = $_POST['title'] ?? '';
$note  = $_POST['note'] ?? '';

if ($title !== '' && $note !== '') {
  $stmt = $pdo->prepare('INSERT INTO records (title, note) VALUES (?, ?)');
  $stmt->execute([$title, $note]);
}

header('Location: list.php');
exit;