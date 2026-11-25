<?php
require 'db.php';

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

if ($title !== '' && $note !== '') {
  $stmt = $pdo->prepare(
    'INSERT INTO records (title, category, experienced_on, rating, note) VALUES (?, ?, ?, ?, ?)'
  );
  $stmt->execute([$title, $category, $date, $rating, $note]);
}

header('Location: list.php');
exit;