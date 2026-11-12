<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id    = $_POST['id'] ?? '';
  $title = $_POST['title'] ?? '';
  $note  = $_POST['note'] ?? '';

  if ($id !== '' && $title !== '' && $note !== '') {
    $stmt = $pdo->prepare('UPDATE records SET title = ?, note = ? WHERE id = ?');
    $stmt->execute([$title, $note, $id]);
  }

  header('Location: detail.php?id=' . urlencode($id));
  exit;
}

header('Location: list.php');
exit;