<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id       = $_POST['id'] ?? '';
  $title    = $_POST['title'] ?? '';
  $note     = $_POST['note'] ?? '';
  $category = $_POST['category'] ?? 'その他';
  $date     = $_POST['experienced_on'] ?? '';
  $rating   = $_POST['rating'] ?? '';

  if (!in_array($category, $categories, true)) {
    $category = 'その他';
  }
  $date = ($date !== '') ? $date : null;
  $rating = (ctype_digit($rating) && $rating >= 1 && $rating <= 5) ? (int)$rating : null;

  if ($id !== '' && $title !== '' && $note !== '') {
    $stmt = $pdo->prepare(
      'UPDATE records SET title = ?, category = ?, experienced_on = ?, rating = ?, note = ? WHERE id = ?'
    );
    $stmt->execute([$title, $category, $date, $rating, $note, $id]);
  }

  header('Location: detail.php?id=' . urlencode($id));
  exit;
}

header('Location: list.php');
exit;